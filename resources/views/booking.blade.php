<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
     crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="row min-vh-100 justify-content-center align-items-center">
        <div class="col-md-5 col-lg-4">
            <div class="card shadow-lg p-4 rounded-4">
                <h4 class="text-center mb-4">Book your appointment</h4>
                <form method="post" action="{{ route('booking.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" maxlength="11" name="phone" class="form-control" id="phone" placeholder="Enter phone number">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">date</label>
                        <input type="date" name="appointment_date" value='{{ $date }}' class="form-control" id="date ">
                    </div>
                    <div class="mb-3">
                         <label class="form-label">Time</label><br>
                           @foreach($allTimes as $timeValue => $timeLabel)
                              <input type="radio" id="time{{ $loop->index }}"
                               name="appointment_time" 
                               value="{{ $timeValue }}"
                               @if (in_array($timeValue,  $bookedTimes)) disabled @endif>
                              <label for="time{{ $loop->index }}">{{ $timeLabel }}</label><br>
                               @if(in_array($timeValue,  $bookedTimes))
                              <span class="text-danger">(محجوز)</span>
                              @endif

                           @endforeach
                           

                    </div>
                    <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Book Appointment</button>
                </form>
            </div>
        </div>
    </div>
</div>



</body>
</html>