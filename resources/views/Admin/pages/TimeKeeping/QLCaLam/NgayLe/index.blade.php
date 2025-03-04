<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ffffff;
            color: black;
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .calendar-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            width: fit-content;
            max-height: 80vh;
            padding: 20px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .calendar {
            background: white;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            border: 1px solid #ddd;
        }

        .calendar-header {
            background: transparent;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            color: black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            width: 14%;
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background: #f5f5f5;
            color: black;
            font-weight: bold;
        }

        td {
            background: white;
        }

        td:empty {
            background: #f5f5f5;
        }



        /* Bảng bên phải */
        .right-panel {
            width: 25%;
            background: white;
            position: relative;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .year-picker-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: white;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .year-picker-container input {
            border: none;
            background: transparent;
            font-size: 16px;
            color: black;
            text-align: center;
            cursor: pointer;
            width: 50px;
        }

        .year-picker-container i {
            color: black;
            cursor: pointer;
        }

        .holiday-list {
            margin-top: 15px;
        }

        .holiday-item {
            display: flex;
            align-items: center;
            background: black;
            padding: 8px;
            border-radius: 5px;
            margin-top: 5px;
        }

        .holiday-color {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 10px;
            background: #00C9A7;
        }

        /* Chọn năm */
        .year-picker-container {
            position: relative;
            display: flex;
            align-items: center;
            background: #f8f9fa;
            padding: 8px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        .year-picker-container input {
            border: none;
            background: transparent;
            font-size: 16px;
            width: 80px;
            text-align: center;
            cursor: pointer;
        }

        .year-picker-container i {
            margin-left: 8px;
            color: #666;
            cursor: pointer;
        }

        .year-picker-popup {
            position: absolute;
            right: 15px;
            background: #ffffff;
            border-radius: 8px;
            padding: 10px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
            display: none;
            text-align: center;
        }

        .year-picker-popup .year-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .year-picker-popup .year {
            padding: 8px;
            background: #f0f0f0;
            color: black;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }

        .year-picker-popup .year:hover {
            background: #d0d0d0;
        }

        .year-picker-popup .selected {
            background: #007bff;
            color: white;
        }

        .right-panel {
        width: 25%;
        background: #282A36;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        color: white;
    }
    </style>
</head>
<body>



    <div class="main-container d-flex">
        <div class="calendar-container" id="calendar-container"></div>
    
        <!-- Bảng bên phải -->
        <div class="right-panel">
            <div class="year-picker-container" onclick="toggleYearPicker()">
                <span>Year</span>
                <input type="text" id="yearSelect" readonly value="2025">
                <i class="fa fa-calendar"></i>
            </div>
            
            <div id="yearPicker" class="year-picker-popup">
                <div class="year-grid" id="yearGrid"></div>
                <div class="d-flex justify-content-between">
                    <button onclick="changeYear(-10)">←</button>
                    <button onclick="changeYear(10)">→</button>
                </div>
            </div>
            <div class="holiday-list" id="holiday-list"></div>
        </div>
    </div>

<script>
    let currentYear = new Date().getFullYear();

    function createYearOptions() {
        const select = document.getElementById("yearSelect");
        const currentYear = new Date().getFullYear();
        
        for (let i = currentYear - 50; i <= currentYear + 50; i++) {
            let option = document.createElement("option");
            option.value = i;
            option.textContent = i;
            if (i === currentYear) option.selected = true;
            select.appendChild(option);
        }
    }


    function toggleYearPicker() {
        const yearPicker = document.getElementById("yearPicker");
        yearPicker.style.display = yearPicker.style.display === "block" ? "none" : "block";
        renderYearPicker(currentYear);
    }

    function renderYearPicker(startYear) {
        const yearGrid = document.getElementById("yearGrid");
        yearGrid.innerHTML = "";

        for (let i = startYear - 4; i <= startYear + 5; i++) {
            const yearDiv = document.createElement("div");
            yearDiv.classList.add("year");
            yearDiv.textContent = i;

            if (i === currentYear) {
                yearDiv.classList.add("selected");
            }

            yearDiv.onclick = function () {
                document.getElementById("yearSelect").value = i;
                currentYear = i;
                document.getElementById("yearPicker").style.display = "none";
                updateCalendar();
            };

            yearGrid.appendChild(yearDiv);
        }
    }

    function createCalendar(year) {
        const container = document.getElementById('calendar-container');
        container.innerHTML = "";
        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        
        for (let month = 0; month < 12; month++) {
            let firstDay = new Date(year, month, 1).getDay();
            let lastDate = new Date(year, month + 1, 0).getDate();
            
            let calendarHTML = `
                <div class="calendar">
                    <div class="calendar-header">${monthNames[month]}</div>
                    <table>
                        <thead>
                            <tr>
                                <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
            `;

            let day = 1;
            for (let i = 0; i < 6; i++) {
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        calendarHTML += `<td></td>`;
                    } else if (day > lastDate) {
                        calendarHTML += `<td></td>`;
                    } else {
                        calendarHTML += `<td>${day}</td>`;
                        day++;
                    }
                }
                calendarHTML += `</tr><tr>`;
            }

            calendarHTML += `</tr></tbody></table></div>`;
            container.innerHTML += calendarHTML;
        }
    }

    function fetchHolidays(year) {
        // Dữ liệu giả lập từ API
        let holidays = {
            "2025": [
                { name: "Nghỉ Tết Dương Lịch", date: "01/01/2025" },
                { name: "giải phóng", date: "30/04/2025" },
                { name: "Ngày quốc tế lao động", date: "01/05/2025" }
            ],
            "2026": [
                { name: "Nghỉ Tết Dương Lịch", date: "01/01/2026" },
                { name: "Ngày quốc tế phụ nữ", date: "08/03/2026" },
                { name: "Quốc khánh", date: "02/09/2026" }
            ]
        };

        let holidayList = document.getElementById("holiday-list");
        holidayList.innerHTML = "";

        let data = holidays[year] || [];
        data.forEach(holiday => {
            let holidayItem = document.createElement("div");
            holidayItem.classList.add("holiday-item");

            let colorBox = document.createElement("div");
            colorBox.classList.add("holiday-color");

            let text = document.createElement("span");
            text.textContent = `${holiday.name} ${holiday.date}`;

            holidayItem.appendChild(colorBox);
            holidayItem.appendChild(text);
            holidayList.appendChild(holidayItem);
        });
    }

   
    function changeYear(delta) {
        currentYear += delta;
        renderYearPicker(currentYear);
    }
    function updateCalendar() {
        let selectedYear = document.getElementById("yearSelect").value;
        createCalendar(selectedYear);
        fetchHolidays(selectedYear);
    }

    updateCalendar();
</script>

</body>
</html>
