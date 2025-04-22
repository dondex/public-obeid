@extends('layouts.master')

@section('title', 'View Record')

@section('content')

<div class="container-fluid">
    <div class="card shadow-sm border-0 rounded-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Record Details</h4>
            <div>
                <a href="javascript:void(0);" class="btn btn-light btn-sm shadow-sm no-print" onclick="printRecord()">
                    <i class="fas fa-print text-primary mx-2"></i>Print
                </a>
                <a href="{{ url('admin/records') }}" class="btn btn-light btn-sm shadow-sm no-print">
                    <i class="fas fa-arrow-alt-circle-left text-primary mx-2"></i>Back
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <h5 class="mt-4"><b>Patient Information</b></h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Patient Name</th>
                        <td class="text-capitalize">{{ $record->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Resident Number</th>
                        <td>{{ $record->resident_number }}</td>
                    </tr>
                    <tr>
                        <th>Phone Number</th>
                        <td>{{ $record->phone_number }}</td>
                    </tr>
                    <tr>
                        <th>Birthday</th>
                        <td>{{ \Carbon\Carbon::parse($record->birthday)->format('F j, Y') }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td class="text-capitalize">{{ $record->gender }}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{ $record->address }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h5 class="mt-4"><b>Medical History</b></h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Past Medical History</th>
                        <td>{{ $record->past_medical_history }}</td>
                    </tr>
                    <tr>
                        <th>Family Medical History</th>
                        <td>{{ $record->family_medical_history }}</td>
                    </tr>
                    <tr>
                        <th>Current Medications</th>
                        <td>{{ $record->current_medications }}</td>
                    </tr>
                    <tr>
                        <th>Treatment Plans</th>
                        <td>{{ $record->treatment_plans }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h5 class="mt-4"><b>Test Results</b></h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Lab Test Results</th>
                        <td>{{ $record->lab_test_results }}</td>
                    </tr>
                    <tr>
                        <th>Physical Exam Notes</th>
                        <td>{{ $record->physical_exam_notes }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h5 class="mt-4"><b>Appointments</b></h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Appointment History</th>
                        <td>{{ $record->appointment_history }}</td>
                    </tr>
                    <tr>
                        <th>Upcoming Appointments</th>
                        <td>{{ $record->upcoming_appointments }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h5 class="mt-4"><b>Feedback and History</b></h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Appointment Feedback</th>
                        <td>{{ $record->appointment_feedback }}</td>
                    </tr>
                    <tr>
                        <th>Prescription History</th>
                        <td>{{ $record->prescription_history }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h5 class="mt-4"><b>Allergies and Reactions</b></h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Known Allergies</th>
                        <td>{{ $record->known_allergies }}</td>
                    </tr>
                    <tr>
                        <th>Adverse Reactions</th>
                        <td>{{ $record->adverse_reactions }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h5 class="mt-4"><b>Vaccination and Lifestyle</b></h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Vaccination History</th>
                        <td>{{ $record->vaccination_history }}</td>
                    </tr>
                    <tr>
                        <th>Lifestyle Factors</th>
                        <td>{{ $record->lifestyle_factors }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h5 class="mt-4"><b>Social Determinants</b></h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Social Determinants</th>
                        <td>{{ $record->social_determinants }}</td>
                    </tr>
                    <tr>
                        <th>Communication Logs</th>
                        <td>{{ $record->communication_logs }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h5 class="mt-4"><b>Care Plans and Generated Data</b></h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Care Plans</th>
                        <td>{{ $record->care_plans }}</td>
                    </tr>
                    <tr>
                        <th>Patient Generated Data</th>
                        <td>{{ $record->patient_generated_data }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h5 class="mt-4"><b>Insurance and Billing</b></h5>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Insurance Details</th>
                        <td>{{ $record->insurance_details }}</td>
                    </tr>
                    <tr>
                        <th>Billing History</th>
                        <td>{{ $record->billing_history }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <!-- Display Profile Picture Image -->
            @if($record->profile_image)
                <div class="mb-3 no-print">
                    <b>Profile Picture:</b><br>
                    <img src="{{ asset($record->profile_image) }}" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 100px; height: 100px;">
                </div>
            @endif

            @if(!empty($record->lab_results_image))
                <div class="row m-3 bg-white px-1 py-4 rounded no-print">
                    <div class="rounded shadow-sm p-3">
                        <h6>Lab Test Result</h6>
                        @php
                            $labResultsFileType = pathinfo($record->lab_results_image, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($labResultsFileType, ['jpg', 'jpeg', 'png', 'gif']))
                            <a href="#" data-toggle="modal" data-target="#labResultModal">
                                <img src="{{ asset($record->lab_results_image) }}" alt="Lab Results" class="img-fluid" style="max-width: 100%; height: auto;">
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="labResultModal" tabindex="-1" role="dialog" aria-labelledby="labResultModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="labResultModalLabel">Lab Test Result</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset($record->lab_results_image) }}" alt="Lab Results" class="img-fluid" style="max-width: 100%; height: auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        <p>Lab Results File: <a href="{{ asset($record->lab_results_image) }}" target="_blank">{{ basename($record->lab_results_image) }}</a></p>
                        @endif

                        <a href="{{ asset($record->lab_results_image) }}" download class="btn btn-primary mt-2">
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>
                </div>
            @endif

            @if(!empty($record->imaging_studies_image))
                <div class="row m-3 bg-white px-1 py-4 rounded no-print">
                    <div class="rounded shadow-sm p-3">
                        <h6>Image Studies</h6>
                        @php
                            $imagingStudiesFileType = pathinfo($record->imaging_studies_image, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($imagingStudiesFileType, ['jpg', 'jpeg', 'png', 'gif']))
                            <a href="#" data-toggle="modal" data-target="#imagingStudiesModal">
                                <img src="{{ asset($record->imaging_studies_image) }}" alt="Imaging Studies" class="img-fluid" style="max-width: 100%; height: auto;">
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="imagingStudiesModal" tabindex="-1" role="dialog" aria-labelledby="imagingStudiesModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imagingStudiesModalLabel">Image Studies</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{{ asset($record->imaging_studies_image) }}" alt="Imaging Studies" class="img-fluid" style="max-width: 100%; height: auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <p>Imaging Studies File: <a href="{{ asset($record->imaging_studies_image) }}" target="_blank">{{ basename($record->imaging_studies_image) }}</a></p>
                        @endif

                        <a href="{{ asset($record->imaging_studies_image) }}" download class="btn btn-primary mt-2">
                            <i class="fas fa-download"></i> Download
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>



<script>
    function printRecord() {
        var printWindow = window.open('', '_blank', 'width=800,height=600');
        printWindow.document.write('<html><head><title>Print Record</title>');
        printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">');
        
        // Add custom styles for the print
        printWindow.document.write('<style>');
        printWindow.document.write('body { font-family: Arial, sans-serif; margin: 0; padding: 20px; color: #333; background-color: #fff; }'); // General styles
        printWindow.document.write('.no-print { display: none; }'); // Hide elements that should not be printed
        printWindow.document.write('.card { border: none; box-shadow: none; margin: 0; padding: 0; }'); // Card styles
        printWindow.document.write('.card-header { background-color: #007bff; color: white; padding: 15px; text-align: center; border-bottom: 2px solid #0056b3; }'); // Card header styles
        printWindow.document.write('.card-body { padding: 20px; }'); // Card body styles
        printWindow.document.write('h4, h5, h6 { margin: 10px 0; color: #007bff; }'); // Heading styles
        printWindow.document.write('h4 { font-size: 24px; }'); // Main title size
        printWindow.document.write('h5 { font-size: 20px; border-bottom: 1px solid #ddd; padding-bottom: 5px; margin-bottom: 15px; }'); // Section title size
        printWindow.document.write('h6 { font-size: 16px; font-weight: bold; }'); // Subheading size
        printWindow.document.write('p { font-size: 14px; line-height: 1.5; margin: 5px 0 15px; }'); // Paragraph styles
        printWindow.document.write('img { max-width: 100%; height: auto; display: block; margin: 0 auto; }'); // Image styles
        printWindow.document.write('.section { margin-bottom: 30px; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9; }'); // Section styles
        printWindow.document.write('.page-break { page-break-after: always; }'); // Page break
        printWindow.document.write('</style>');
        
        printWindow.document.write('</head><body>');

        // Add the logo at the top
        printWindow.document.write('<div style="text-align: center; margin-bottom: 20px;">');
        printWindow.document.write('<img src="{{ asset('uploads/obeid-logo.png') }}" alt="Logo" style="max-width: 200px; height: auto;">'); // Adjust the path and size as needed
        printWindow.document.write('</div>');

      

        // Append the content of the current page
        var content = document.querySelector('.container-fluid').innerHTML; // Select by class
        printWindow.document.write(content);

        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.onload = function() {
            printWindow.print();
            printWindow.close();
        };
    }
</script>

@endsection