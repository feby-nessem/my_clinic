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
   <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>actions</th>

            </tr>
        </thead>
        <tbody>
        @foreach ($appointments as $appointment )
                 <tr>
                <td>{{ $appointment->name}}</td>
                <td>{{ $appointment->phone }}</td>
                <td>{{ $appointment->appointment_date}}</td>
                <td>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</td>
                <td>{{ $appointment->status}}</td>
                <td>
                    <a href="{{ route('booking.edit', $appointment->id) }}" 
                        class="btn btn-primary">  Edit 
                     </a>
                    <form action="{{ route('booking.destroy', $appointment->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
         @endforeach
           
        </tbody>
    </table>
</div>

</body>
</html>