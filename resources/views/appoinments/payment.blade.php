@extends('layouts.main')

@section('content')

<div class="content-wrapper mt-0">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Complete Payment for Appointment ID: {{ $appointment->id }}</h1>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Payment form start -->
            <form method="POST" action="{{ route('complete.payment', $appointment->id ) }}">
                <div class="info-box d-block">
                    @csrf
                    <div>
                        <p>Patient Name: {{ $appointment->patient_first_name }} {{ $appointment->patient_last_name }}</p>
                        <p>Appointment Date: {{ $appointment->appointment_date }}</p>
                        <p>Payment Due : 50$</p>
                        <!-- Add more appointment details as needed -->
                    </div>

                    <div class="form-group">
                        <label for="card_number">Card Number</label>
                        <input type="text" class="form-control" id="card_number" name="card_number" placeholder="Enter card number">
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="expiry_date">Expiry Date</label>
                            <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YYYY">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" name="cvv" placeholder="CVV">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="card_holder_name">Card Holder Name</label>
                        <input type="text" class="form-control" id="card_holder_name" name="card_holder_name" placeholder="Enter card holder name">
                    </div>


                    <div class=" mt-2">
                        <button type="submit" class="btn btn-block bg-gradient-secondary">
                            Pay Now
                        </button>
                    </div>
                </div>

            </form>

            <!-- Payment form end -->
        </div>

        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
@section('script')
<script src="https://js.stripe.com/v3/"></script>
@endsection
