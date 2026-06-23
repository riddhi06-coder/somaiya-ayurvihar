<!doctype html>
<html lang="en">

<head>
    @include('components.backend.head')
</head>

    @include('components.backend.header')

    <!--start sidebar wrapper-->
    @include('components.backend.sidebar')
    <!--end sidebar wrapper-->

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-title">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">
                                <svg class="stroke-icon">
                                    <use href="../assets/svg/icon-sprite.svg#stroke-home"></use>
                                </svg></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.contact-enquiries.index') }}">Home</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{ route('admin.contact-enquiries.index') }}">Contact Enquiries</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">Enquiry Details</li>
                                    </ol>
                                </nav>

                                <a href="{{ route('admin.contact-enquiries.index') }}" class="btn btn-sm btn-secondary">
                                    &larr; Back to List
                                </a>
                            </div>

                            <div class="table-responsive custom-scrollbar">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th style="width: 25%;">First Name</th>
                                            <td>{{ $enquiry->first_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td>{{ $enquiry->last_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>
                                                <a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Mobile</th>
                                            <td>
                                                <a href="tel:{{ $enquiry->mobile_no }}">{{ $enquiry->mobile_no }}</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Message</th>
                                            <td style="white-space: pre-line;">{{ $enquiry->user_message }}</td>
                                        </tr>
                                        @if($enquiry->created_at)
                                        <tr>
                                            <th>Submitted On</th>
                                            <td>{{ $enquiry->created_at->format('d M Y, h:i A') }}</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer start-->
    @include('components.backend.footer')
    </div>
</div>

    @include('components.backend.main-js')

</body>

</html>