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
                <h4 class="text-center mb-4">edit your appointment</h4>

                <form method="POST" action="{{ route('booking.update', $appointment->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputName" value="{{ $appointment->name }}" placeholder="Enter your name">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $appointment->phone }}" placeholder="Enter phone number" maxlength="11">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">date</label>
                        <input type="date" name="appointment_date" class="form-control" id="date " value="{{ $appointment->appointment_datetime->format('Y-m-d') }}">
                    </div>
                  <div class="mb-3">
      <div class="mb-3">
        <label class="form-label">Choose Time</label>
        <div class="d-flex flex-wrap gap-3">
         @foreach($times as $value => $label)
            <div class="form-check">
              <input class="form-check-input" type="radio" name="appointment_time" value="{{ $value }}"
               {{ old('appointment_time', $appointment->appointment_datetime->format('H:i:s')) == $value ? 'checked' : '' }}>
              <label class="form-check-label">{{ $label }}</label>
             </div>
         @endforeach
        </div>
    </div>
</div>
                    <div class="d-grid">
                      <button  type="submit" class="btn btn-primary btn-lg">update</button> 
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



</body>
</html>