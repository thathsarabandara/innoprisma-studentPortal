<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">
      <div class="card shadow-lg rounded-4">
        <div class="card-body p-4">
          <h2 class="text-center mb-4">Student Registration</h2>
          
          @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
          @endif
          
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
          
          <form action="{{ route('student.register') }}" method="POST">
            @csrf

            <div class="mb-3">
              <label>Name</label>
              <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Email</label>
              <input 
                type="email" 
                class="form-control" 
                name="email"
                id="email"
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                title="Please enter a valid email address (e.g., example@domain.com)"
                oninput="validateEmail(this)"
                required>
              <div id="emailError" class="text-danger small mt-1"></div>
            </div>

            <div class="mb-3">
              <label>WhatsApp Number</label>
              <input 
                type="text" 
                class="form-control" 
                name="whatsapp"
                id="whatsapp"
                pattern="[0-9]{10}"
                title="Please enter a valid 10-digit phone number"
                oninput="validateNumber(this)"
                maxlength="10"
                required>
              <div id="whatsappError" class="text-danger small mt-1"></div>
            </div>

            <div class="mb-3">
              <label>School</label>
              <input type="text" name="school" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Grade</label>
              <input type="text" name="grade" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Address</label>
              <textarea name="address" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
              <label>Parent Name</label>
              <input type="text" name="parent_name" class="form-control" required>
            </div>

            <div class="mb-3">
              <label>Parent Phone Number</label>
              <input type="text" name="parent_phone" class="form-control" required>
            </div>
            
            <a href="/success" class="btn btn-success w-100 py-2">Submit</a>
           <!-- <button type="submit" class="btn btn-success w-100 py-2">Submit</button>-->
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
@push('scripts')
<script>
function validateEmail(input) {
    const email = input.value;
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
    if (email === '') {
        emailError.textContent = '';
        input.classList.remove('is-invalid');
        return;
    }

    if (!emailRegex.test(email)) {
        input.classList.add('is-invalid');
        emailError.textContent = 'Please enter a valid email address (e.g., example@domain.com)';
    } else {
        input.classList.remove('is-invalid');
        emailError.textContent = '';
    }
}

function validateNumber(input) {
    const value = input.value;
    const errorElement = document.getElementById('whatsappError');
    const numberRegex = /^[0-9]{10}$/;
    
    if (value === '') {
        errorElement.textContent = '';
        input.classList.remove('is-invalid');
        return;
    }

    if (!/^[0-9]*$/.test(value)) {
        input.classList.add('is-invalid');
        errorElement.textContent = 'Please enter numbers only';
    } else if (value.length !== 10) {
        input.classList.add('is-invalid');
        errorElement.textContent = 'Phone number must be exactly 10 digits';
    } else {
        input.classList.remove('is-invalid');
        errorElement.textContent = '';
    }
}
</script>
@endpush
</html>
