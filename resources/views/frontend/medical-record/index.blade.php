@extends('layouts.app')

@section('title', 'Obeid Hospital')

@section('content')

<div class="section-bg pb-5">
    <section>
        <div class="container">
            <div class="row bg-img-medical row-space row-radius1 ">
                <div class="col-6 ">
                    <!-- <i class="fas fa-book icon-header"></i> -->
                </div>
                <!-- <div class="col-6 ">
                    <h3 class="text-center">Book Appointment</h3>
                </div> -->
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row ">
            <div class="col-12 p-4">
                <h5>Medical Records</h5>
                <div class="d-flex justify-content-between align-items-center">
                    <button class="btn btn-primary" onclick="printRecord()">
                        <i class="fas fa-print"></i> Print Record
                    </button>
                    <button class="btn btn-primary" onclick="downloadPDF()">
                        <i class="fas fa-file-pdf"></i> Download as PDF
                    </button>
                </div>
                
            </div>   
        </div>
    </div>

    <div class="row m-3 bg-white px-1 py-4 rounded">
        <h5 class="font-bold text-capitalize text-dark">{{ $user->name }}'s Record</h5>
        
        @foreach($records as $record)
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="col-md-4 py-2">
                        <strong>Profile Image:</strong><br>
                        @if($record->profile_image)
                            <img src="{{ asset($record->profile_image) }}" alt="Profile Image" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                        @else
                            <span>No Image Available</span>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <strong>Resident Number:</strong> {{ $record->resident_number }}
                    </div>
                    <div class="col-md-4">
                        <strong>Phone Number:</strong> {{ $record->phone_number }}
                    </div>
                    <div class="col-md-4">
                        <strong>Birthday:</strong> {{ \Carbon\Carbon::parse($record->birthday)->format('F j, Y') }} (Age: {{ \Carbon\Carbon::parse($record->birthday)->age }})
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <strong>Gender:</strong> <span class="text-capitalize">{{ $record->gender }}</span>
                    </div>
                    <div class="col-md-4">
                        <strong>Address:</strong> {{ $record->address }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container" id="medical-records"> <!-- Unique ID for the records container -->
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Category</th>
                    <th>Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($records as $record)
                    @if(!empty($record->past_medical_history))
                        <tr>
                            <td>Past Medical History</td>
                            <td>{{ $record->past_medical_history }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->family_medical_history))
                        <tr>
                            <td>Family Medical History</td>
                            <td>{{ $record->family_medical_history }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->current_medications))
                        <tr>
                            <td>Current Medications</td>
                            <td>{{ $record->current_medications }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->treatment_plans))
                        <tr>
                            <td>Treatment Plans</td>
                            <td>{{ $record->treatment_plans }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->lab_test_results))
                        <tr>
                            <td>Lab Test Results</td>
                            <td>{{ $record->lab_test_results }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->physical_exam_notes))
                    <tr>
                            <td>Physical Exam Notes</td>
                            <td>{{ $record->physical_exam_notes }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->appointment_history))
                        <tr>
                            <td>Appointment History</td>
                            <td>{{ $record->appointment_history }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->upcoming_appointments))
                        <tr>
                            <td>Upcoming Appointments</td>
                            <td>{{ $record->upcoming_appointments }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->appointment_feedback))
                        <tr>
                            <td>Appointment Feedback</td>
                            <td>{{ $record->appointment_feedback }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->prescription_history))
                        <tr>
                            <td>Prescription History</td>
                            <td>{{ $record->prescription_history }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->known_allergies))
                        <tr>
                            <td>Known Allergies</td>
                            <td>{{ $record->known_allergies }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->adverse_reactions))
                        <tr>
                            <td>Adverse Reactions</td>
                            <td>{{ $record->adverse_reactions }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->vaccination_history))
                        <tr>
                            <td>Vaccination History</td>
                            <td>{{ $record->vaccination_history }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->lifestyle_factors))
                        <tr>
                            <td>Lifestyle Factors</td>
                            <td>{{ $record->lifestyle_factors }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->social_determinants))
                        <tr>
                            <td>Social Determinants</td>
                            <td>{{ $record->social_determinants }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->communication_logs))
                        <tr>
                            <td>Communication Logs</td>
                            <td>{{ $record->communication_logs }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->care_plans))
                        <tr>
                            <td>Care Plans</td>
                            <td>{{ $record->care_plans }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->patient_generated_data))
                        <tr>
                            <td>Patient Generated Data</td>
                            <td>{{ $record->patient_generated_data }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->insurance_details))
                        <tr>
                            <td>Insurance Details</td>
                            <td>{{ $record->insurance_details }}</td>
                        </tr>
                    @endif
                    @if(!empty($record->billing_history))
                        <tr>
                            <td>Billing History</td>
                            <td>{{ $record->billing_history }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div> <!-- End of medical records container -->
</div> <!-- End of section-bg -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function printRecord() {
        var printWindow = window.open('', '_blank', 'width=800,height=600');
        printWindow.document.write('<html><head><title>Print Medical Record</title>');
        printWindow.document.write('<link rel="stylesheet" href="{{ asset('path/to/your/css/bootstrap.min.css') }}">');
        
        // Add custom styles for the print
        printWindow.document.write('<style>');
        printWindow.document.write('body { font-family: Arial, sans-serif; }'); // Change 'Arial' to your desired font
        printWindow.document.write('table { width: 100%; border-collapse: collapse; }');
        printWindow.document.write('th, td { padding: 8px; text-align: left; border: 1px solid #ddd; }');
        printWindow.document.write('hr { margin: 20px 0; }'); // Optional: style for horizontal rules
        printWindow.document.write('</style>');
        
        printWindow.document.write('</head><body>');

        // Add the logo at the top (if you have one)
        printWindow.document.write('<div style="text-align: center; margin-bottom: 20px;">');
        printWindow.document.write('<img src="{{ asset('uploads/obeid-logo.png') }}" alt="Logo" style="max-width: 200px; height: auto;">');
        printWindow.document.write('</div>');

        // Add personal information
        printWindow.document.write('<h5>' + '{{ $user->name }}' + '\'s Record</h5>');
        
        // Add profile image
        printWindow.document.write('<div><strong>Profile Image:</strong><br>');
        @if($record->profile_image)
            printWindow.document.write('<img src="{{ asset($record->profile_image) }}" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 50%;">');
        @else
            printWindow.document.write('<span>No Image Available</span>');
        @endif
        printWindow.document.write('</div>');

        printWindow.document.write('<div><strong>Resident Number:</strong> ' + '{{ $record->resident_number }}' + '</div>');
        printWindow.document.write('<div><strong>Phone Number:</strong> ' + '{{ $record->phone_number }}' + '</div>');
        printWindow.document.write('<div><strong>Birthday:</strong> ' + '{{ \Carbon\Carbon::parse($record->birthday)->format('F j, Y') }}' + ' (Age: ' + '{{ \Carbon\Carbon::parse($record->birthday)->age }}' + ')</div>');
        printWindow.document.write('<div><strong>Gender:</strong> ' + '{{ $record->gender }}' + '</div>');
        printWindow.document.write('<div><strong>Address:</strong> ' + '{{ $record->address }}' + '</div>');
        printWindow.document.write('<hr>'); // Add a horizontal line

        // Append the content of the current page
        var content = document.getElementById('medical-records').innerHTML; // Select by ID
        printWindow.document.write(content);

        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.onload = function() {
            printWindow.print();
            printWindow.close();
        };
    }

    function downloadPDF() {
    // Create a new element to hold the content for the PDF
    const pdfContent = document.createElement('div');

    // Add styles for the PDF content
    pdfContent.style.fontFamily = 'Arial, sans-serif'; // Set font family
    pdfContent.style.lineHeight = '1.5'; // Set line height for better readability
    pdfContent.style.margin = '0'; // Remove default margin
    pdfContent.style.padding = '20px'; // Add padding around the content
    pdfContent.style.boxSizing = 'border-box'; // Include padding in height calculation

    // Add the logo
    pdfContent.innerHTML += '<div style="text-align: center; margin-bottom: 20px;">';
    pdfContent.innerHTML += '<img src="{{ asset('uploads/obeid-logo.png') }}" alt="Logo" style="max-width: 200px; height: auto;">';
    pdfContent.innerHTML += '</div>';

    // Add personal information
    pdfContent.innerHTML += '<h5>' + '{{ $user->name }}' + '\'s Record</h5>';
    
    // Add profile image
    pdfContent.innerHTML += '<div style="margin-bottom: 10px;"><strong>Profile Image:</strong><br>';
    @if($record->profile_image)
        pdfContent.innerHTML += '<img src="{{ asset($record->profile_image) }}" alt="Profile Image" style="width: 100px; height: 100px; border-radius: 50%;">';
    @else
        pdfContent.innerHTML += '<span>No Image Available</span>';
    @endif
    pdfContent.innerHTML += '</div>';

    pdfContent.innerHTML += '<div style="margin-bottom: 10px;"><strong>Resident Number:</strong> ' + '{{ $record->resident_number }}' + '</div>';
    pdfContent.innerHTML += '<div style="margin-bottom: 10px;"><strong>Phone Number:</strong> ' + '{{ $record->phone_number }}' + '</div>';
    pdfContent.innerHTML += '<div style="margin-bottom: 10px;"><strong>Birthday:</strong> ' + '{{ \Carbon\Carbon::parse($record->birthday)->format('F j, Y') }}' + ' (Age: ' + '{{ \Carbon\Carbon::parse($record->birthday)->age }}' + ')</div>';
    pdfContent.innerHTML += '<div style="margin-bottom: 10px;"><strong>Gender:</strong> ' + '{{ $record->gender }}' + '</div>';
    pdfContent.innerHTML += '<div style="margin-bottom: 10px;"><strong>Address:</strong> ' + '{{ $record->address }}' + '</div>';
    pdfContent.innerHTML += '<hr style="margin: 20px 0;">'; // Add a horizontal line with margin

    // Append the content of the current page
    pdfContent.innerHTML += document.getElementById('medical-records').innerHTML; // Select by ID

    // Use html2pdf to generate the PDF
    html2pdf()
        .from(pdfContent)
        .set({
            margin: 0, // Set margin for the PDF to zero
            filename: 'medical_record.pdf', // Name of the downloaded file
            html2canvas: { scale: 2 }, // Increase scale for better quality
            jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' } // Set PDF format
        })
        .save();
    }
</script>
@endsection