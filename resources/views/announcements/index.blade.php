@extends('layouts.app')

@section('content')

@php
    $indoDays = [
        'Sunday' => 'Minggu', 'Monday' => 'Senin', 'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu', 'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu'
    ];
    $indoMonths = [
        'January' => 'Januari', 'February' => 'Februari', 'March' => 'Maret',
        'April' => 'April', 'May' => 'Mei', 'June' => 'Juni',
        'July' => 'Juli', 'August' => 'Agustus', 'September' => 'September',
        'October' => 'Oktober', 'November' => 'November', 'December' => 'Desember'
    ];

    $processedAnnouncements = $announcements->map(function($item) use ($indoDays, $indoMonths) {
        $date = \Carbon\Carbon::parse($item->date_posted);
        $dayEnglish = $date->format('l');
        $monthEnglish = $date->format('F');

        return [
            'id' => $item->id,
            'title' => $item->title,
            'content' => $item->content,
            'date_raw' => $date->format('Y-m-d'),
            'date_human' => $date->format('d') . ' ' . ($indoMonths[$monthEnglish] ?? $monthEnglish) . ' ' . $date->format('Y'),
            'day_name' => $indoDays[$dayEnglish] ?? $dayEnglish,
        ];
    });
@endphp

<style>
    .btn-action {
        border: none; background: transparent; padding: 0; border-radius: 50%;
        transition: all 0.3s ease; font-size: 16px; margin: 0 3px;
        display: inline-flex; align-items: center; justify-content: center;
        width: 35px; height: 35px; min-width: 35px; min-height: 35px;
        flex-shrink: 0; text-decoration: none !important; line-height: 1; cursor: pointer;
    }
    .btn-action-edit { color: #f39c12; background-color: rgba(243, 156, 18, 0.1); }
    .btn-action-edit:hover { background-color: #f39c12; color: white; transform: scale(1.1); }
    .btn-action-delete { color: #e74c3c; background-color: rgba(231, 76, 60, 0.1); }
    .btn-action-delete:hover { background-color: #e74c3c; color: white; transform: scale(1.1); }

    .calendar-container {
        background: #fff; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        overflow: hidden; min-height: 550px; display: flex; flex-wrap: wrap; border: 1px solid #eee;
    }

    .calendar-section {
        flex: 2; padding: 30px; border-right: 1px solid #f0f0f0; min-width: 320px;
    }
    
    .detail-section {
        flex: 1; background-color: #fafafa; padding: 30px; min-width: 300px; display: flex; flex-direction: column;
    }

    .calendar-header {
        display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;
    }
    .month-year {
        font-size: 20px; font-weight: 700; color: #333; text-transform: uppercase; text-align: center;
    }
    .btn-nav-month {
        background: white; border: 1px solid #eee; border-radius: 50%; width: 38px; height: 38px;
        cursor: pointer; transition: 0.3s; color: #555; display: flex; align-items: center; justify-content: center;
        flex-shrink: 0;
    }
    .btn-nav-month:hover { background: #0984e3; color: white; border-color: #0984e3; }

    .days-grid {
        display: grid; grid-template-columns: repeat(7, 1fr); gap: 5px; text-align: center;
    }
    .day-name {
        font-weight: 600; color: #aaa; font-size: 12px; margin-bottom: 15px; text-transform: uppercase;
    }
    .calendar-day {
        height: 45px; width: 45px; margin: 0 auto; border-radius: 50%;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        cursor: pointer; transition: all 0.2s ease; position: relative;
        font-size: 14px; font-weight: 500; color: #444; border: 2px solid transparent;
    }
    
    .calendar-day:hover { background-color: #f8f9fa; color: #0984e3; }
    .calendar-day.active-date {
        background-color: #333; color: white; box-shadow: 0 5px 15px rgba(0,0,0,0.2); transform: scale(1.1);
    }
    .calendar-day.has-event::after {
        content: ''; position: absolute; bottom: 4px; width: 5px; height: 5px;
        background-color: #0984e3; border-radius: 50%;
    }
    .calendar-day.today {
        border: 2px solid #0984e3; color: #0984e3; font-weight: bold;
    }

    .detail-header h3 {
        margin: 0; font-size: 18px; font-weight: 700; color: #000000; margin-bottom: 5px;
    }
    .selected-date-subtitle {
        font-size: 14px; color: #636e72; margin-bottom: 20px; display: block;
        font-weight: 500; border-bottom: 1px solid #eee; padding-bottom: 10px;
    }

    .event-card {
        background: white; border-radius: 12px; padding: 20px; margin-bottom: 15px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.03);
        border-left: 4px solid #0984e3;
        transition: transform 0.2s; position: relative;
        width: 100%;
    }
    .event-card:hover { transform: translateY(-3px); box-shadow: 0 8px 20px rgba(0,0,0,0.06); }

    .event-date-badge {
        position: absolute; top: 15px; right: 15px; font-size: 11px;
        background: #eef2f7; color: #0984e3; padding: 4px 10px; border-radius: 20px; font-weight: 600;
    }
    .event-title {
        font-weight: 700; font-size: 16px; color: #000000; margin-bottom: 10px; padding-right: 80px;
    }
    .event-desc {
        font-size: 13px; color: #636e72; line-height: 1.5; margin-bottom: 15px;
    }
    .event-actions {
        display: flex; gap: 5px; justify-content: flex-end;
        border-top: 1px solid #f1f1f1; padding-top: 10px;
    }

    .btn-add-float {
        margin-top: auto; 
        background: #0984e3; color: white; text-align: center; padding: 12px; border-radius: 50px;
        text-decoration: none; font-weight: 600;
        box-shadow: 0 4px 10px rgba(9, 132, 227, 0.3);
        transition: 0.3s; display: flex; align-items: center; justify-content: center; gap: 8px;
        flex-shrink: 0;
    }
    .btn-add-float:hover {
        background-color: #076bc2; color: white; transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(9, 132, 227, 0.4);
    }
    
    #eventListContainer {
        flex-grow: 1;
        overflow-y: auto; 
        max-height: 400px; 
        padding-right: 5px;
        display: flex;
        flex-direction: column;
        min-height: 300px;
    }

    @media (max-width: 768px) {
        .calendar-container {
            flex-direction: column; 
            min-height: auto;
        }
        .calendar-section {
            border-right: none;
            border-bottom: 1px solid #eee;
            padding: 15px; 
            min-width: 100%; 
        }
        .detail-section {
            padding: 20px 15px;
            min-width: 100%;
            min-height: 400px;
        }
        
        .calendar-day {
            height: 38px; width: 38px; font-size: 13px;
        }
        .month-year {
            font-size: 18px;
        }
        
        .header-spacing {
            margin-bottom: 20px !important;
            padding-top: 20px !important;
        }
        .section-heading h2 {
            font-size: 24px;
            margin: 0;
        }
    }
</style>

<div class="container wow fadeInUp" data-wow-duration="0.5s">
    
    <div class="header-spacing" style="padding-top: 20px; margin-bottom: 30px;">
        <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s" style="margin-bottom: 0;">
            <h2>Kalender <em style="color: #fe3f40; font-style: normal;">Pengumuman</em></h2>
        </div>
    </div>

    <div class="calendar-container">
        
        <div class="calendar-section">
            <div class="calendar-header">
                <button class="btn-nav-month" id="prevMonth"><i class="fa fa-chevron-left"></i></button>
                <div class="month-year" id="monthYearDisplay"></div>
                <button class="btn-nav-month" id="nextMonth"><i class="fa fa-chevron-right"></i></button>
            </div>

            <div class="days-grid">
                <div class="day-name">Min</div>
                <div class="day-name">Sen</div>
                <div class="day-name">Sel</div>
                <div class="day-name">Rab</div>
                <div class="day-name">Kam</div>
                <div class="day-name">Jum</div>
                <div class="day-name">Sab</div>
            </div>

            <div class="days-grid" id="calendarDays"></div>
        </div>

        <div class="detail-section">
            <div class="detail-header">
                <h3>Daftar Pengumuman</h3>
                <span id="selectedDateSubtitle" class="selected-date-subtitle">Silakan pilih tanggal di kalender</span>
            </div>

            <div id="eventListContainer">
                <div style="text-align: center; color: #bdc3c7;">
                    <i class="fa fa-calendar-check-o" style="font-size: 40px; margin-bottom: 10px;"></i>
                    <p>Klik tanggal yang bertanda biru<br>untuk melihat detail.</p>
                </div>
            </div>

            <a href="{{ route('announcements.create') }}" class="btn-add-float">
                <i class="fa fa-plus-circle"></i> Tambah Pengumuman
            </a>
        </div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const announcements = @json($processedAnnouncements);
        
        const date = new Date();
        let currentMonth = date.getMonth();
        let currentYear = date.getFullYear();

        const monthYearDisplay = document.getElementById('monthYearDisplay');
        const calendarDays = document.getElementById('calendarDays');
        const eventListContainer = document.getElementById('eventListContainer');
        const selectedDateSubtitle = document.getElementById('selectedDateSubtitle');

        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        eventListContainer.style.justifyContent = "center";
        eventListContainer.style.alignItems = "center";

        function renderCalendar(month, year) {
            calendarDays.innerHTML = "";
            monthYearDisplay.innerText = `${monthNames[month]} ${year}`;

            const firstDayIndex = new Date(year, month, 1).getDay();
            const lastDay = new Date(year, month + 1, 0).getDate();

            for (let i = 0; i < firstDayIndex; i++) {
                const emptyDiv = document.createElement('div');
                calendarDays.appendChild(emptyDiv);
            }

            for (let i = 1; i <= lastDay; i++) {
                const dayDiv = document.createElement('div');
                dayDiv.classList.add('calendar-day');
                dayDiv.innerText = i;

                const currentLoopDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
                
                const hasEvent = announcements.some(ann => ann.date_raw === currentLoopDate);
                if (hasEvent) dayDiv.classList.add('has-event');

                const today = new Date();
                if (i === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                    dayDiv.classList.add('today');
                }

                dayDiv.addEventListener('click', function() {
                    document.querySelectorAll('.calendar-day').forEach(d => d.classList.remove('active-date'));
                    this.classList.add('active-date');
                    showEvents(currentLoopDate);
                });

                calendarDays.appendChild(dayDiv);
            }
        }

        function showEvents(dateString) {
            eventListContainer.innerHTML = "";
            
            const eventsOnDate = announcements.filter(ann => ann.date_raw === dateString);

            if (eventsOnDate.length > 0) {
                eventListContainer.style.justifyContent = "flex-start";
                eventListContainer.style.alignItems = "stretch";

                selectedDateSubtitle.innerText = `Pengumuman pada ${eventsOnDate[0].day_name}, ${eventsOnDate[0].date_human}`;
                selectedDateSubtitle.style.color = "#2d3436";
            } else {
                eventListContainer.style.justifyContent = "center";
                eventListContainer.style.alignItems = "center";

                const [y, m, d] = dateString.split('-');
                selectedDateSubtitle.innerText = `Tidak ada data pada ${d} ${monthNames[parseInt(m)-1]} ${y}`;
                selectedDateSubtitle.style.color = "#b2bec3";
            }

            if (eventsOnDate.length > 0) {
                eventsOnDate.forEach(evt => {
                    const card = document.createElement('div');
                    card.classList.add('event-card');
                    
                    const editUrl = `{{ url('announcements') }}/${evt.id}/edit`;
                    const deleteUrl = `{{ url('announcements') }}/${evt.id}`;
                    const token = `{{ csrf_token() }}`;

                    let cleanContent = evt.content.replace(/<[^>]*>?/gm, '');
                    if(cleanContent.length > 80) cleanContent = cleanContent.substring(0, 80) + '...';

                    card.innerHTML = `
                        <span class="event-date-badge">${evt.date_human}</span>
                        <div class="event-title">${evt.title}</div>
                        <div class="event-desc">${cleanContent}</div>
                        
                        <div class="event-actions">
                            <a href="${editUrl}" class="btn-action btn-action-edit" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            
                            <form action="${deleteUrl}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengumuman ini?')" style="display:inline; margin:0;">
                                <input type="hidden" name="_token" value="${token}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn-action btn-action-delete" title="Hapus">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    `;
                    eventListContainer.appendChild(card);
                });
            } else {
                eventListContainer.innerHTML = `
                    <div style="text-align: center; color: #bdc3c7;">
                        <i class="fa fa-folder-open-o" style="font-size: 40px; margin-bottom: 10px;"></i>
                        <p>Tidak ada pengumuman.</p>
                    </div>
                `;
            }
        }

        document.getElementById('prevMonth').addEventListener('click', () => {
            currentMonth--;
            if (currentMonth < 0) { currentMonth = 11; currentYear--; }
            renderCalendar(currentMonth, currentYear);
        });

        document.getElementById('nextMonth').addEventListener('click', () => {
            currentMonth++;
            if (currentMonth > 11) { currentMonth = 0; currentYear++; }
            renderCalendar(currentMonth, currentYear);
        });

        renderCalendar(currentMonth, currentYear);
    });
</script>

@endsection