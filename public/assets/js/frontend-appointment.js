$(document).ready(function() {
    $('#location_id').change(function() {
        var locationId = $(this).val();
        if (locationId) {
            $.ajax({
                url: '/dept-by-loc',
                type: 'GET',
                data: { location_id: locationId },
                success: function(data) {
                    $('#department_id').empty();
                    $('#department_id').append('<option value="">Select a department</option>');
                    $.each(data, function(key, department) {
                        $('#department_id').append('<option value="' + department.id + '">' + department.name + '</option>');
                    });
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
        } else {
            $('#department_id').empty();
            $('#department_id').append('<option value="">Select a department</option>');
            $('#doctor_id').empty();
            $('#doctor_id').append('<option value="">Select a doctor</option>');
        }
    });

    $('#department_id').change(function() {
        var departmentId = $(this).val();
        if (departmentId) {
            $.ajax({
                url: '/doc-by-dept',
                type: 'GET',
                data: { department_id: departmentId },
                success: function(data) {
                    $('#doctor_id').empty();
                    $('#doctor_id').append('<option value="">Select a doctor</option>');
                    $.each(data, function(key, doctor) {
                        $('#doctor_id').append('<option value="' + doctor.id + '">' + doctor.name + '</option>');
                    });
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
        } else {
            $('#doctor_id').empty();
            $('#doctor_id').append('<option value="">Select a doctor</option>');
        }
    });

    $('#doctor_id').change(function() {
        var doctorId = $(this).val();
        if (doctorId) {
            $.ajax({
                url: '/get-doc-sched',
                type: 'GET',
                data: { doctor_id: doctorId },
                success: function(data) {
                    $('#schedule').empty();
                    $('#schedule-container').show();
                    var currentMonth = new Date().getMonth(); // Get the current month (0-11)
                    $.each(data.available_schedule, function(index, schedule) {
                        var monthIndex = getMonthIndex(schedule.month); // Get the month index
                        if (monthIndex === currentMonth) { // Only show the current month
                            var days = schedule.days.map(day => '<button type="button" class="m-1 btn btn-outline-primary day-button" data-day="' + day + '">' + day + '</button>').join(' ');
                            var times = schedule.times.map(formatTime).map(time => '<button type="button" class="m-1 btn btn-outline-secondary time-button" data-time="' + time + '">' + time + '</button>').join(' ');

                            $('#schedule').append('<div><strong>Month of ' + schedule.month + '</strong><br>Days:<br>' + days + '<br>Times:<br>' + times + '<br><br></div>');
                        }
                    });

                    // Day button click event
                    $('.day-button').click(function() {
                        $('.day-button').removeClass('active');
                        $(this).addClass('active');
                        var selectedDay = $(this).data('day');
                        $('#selected-day').text('Selected Day: ' + selectedDay);

                        // Get the current date
                        var currentDate = new Date();
                        var dayOfWeek = getDayOfWeek(selectedDay); // Convert selected day to a number (0-6)

                        // Calculate the next occurrence of the selected day
                        var daysUntilNext = (dayOfWeek + 7 - currentDate.getDay()) % 7;
                        if (daysUntilNext === 0) daysUntilNext = 7; // If today is the selected day, go to next week

                        // Set the appointment date to the next occurrence of the selected day
                        var appointmentDate = new Date(currentDate);
                        appointmentDate.setDate(currentDate.getDate() + daysUntilNext);
                        var formattedDate = appointmentDate.toISOString().split('T')[0]; // Format as YYYY-MM-DD
                        $('#appointment_date_time').val(formattedDate); // Set the hidden input for the date

                        $('#selected-schedule').show();
                        checkSubmitButton();
                    });

                    // Time button click event
                    $('.time-button').click(function() {
                        $('.time-button').removeClass('active');
                        $(this).addClass('active');
                        $('#selected-time').text('Selected Time: ' + $(this).data('time'));
                        $('#appointment_time').val($(this).data('time')); // Set the hidden input for the time
                        $('#selected-schedule').show();
                        checkSubmitButton();
                    });
                },
                error: function(xhr) {
                    console.error(xhr);
                }
            });
        } else {
            $('#schedule-container').hide();
        }
    });

    function formatTime(time) {
        var [hours, minutes] = time.split(':');
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        return hours + ':' + minutes + ' ' + ampm;
    }

    // Function to convert month name to month index (0-11)
    function getMonthIndex(monthName) {
        const months = {
            'January': 0,
            'February': 1,
            'March': 2,
            'April': 3,
            'May': 4,
            'June': 5,
            'July': 6,
            'August': 7,
            'September': 8,
            'October': 9,
            'November': 10,
            'December': 11
        };
        return months[monthName];
    }

    // Function to convert day name to day number (0-6)
    function getDayOfWeek(dayName) {
        const days = {
            'Sunday': 0,
            'Monday': 1,
            'Tuesday': 2,
            'Wednesday': 3,
            'Thursday': 4,
            'Friday': 5,
            'Saturday': 6
        };
        return days[dayName];
    }

    // Function to check if both day and time are selected
    function checkSubmitButton() {
        if ($('#selected-day').text() && $('#selected-time').text()) {
            $('#submit-button').show(); // Show the submit button if both are selected
        } else {
            $('#submit-button').hide(); // Hide the submit button if not
        }
    }
});