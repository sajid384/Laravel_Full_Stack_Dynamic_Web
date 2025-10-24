<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .modal-content {
            border-radius: 10px;
            text-align: center;
        }
        .modal-header {
            background-color: #ff5722;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .modal-body input, .modal-body textarea {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .modal-footer {
            justify-content: center;
        }
        .btn-submit {
            background-color: #ff5722;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-submit:hover {
            background-color: #e64a19;
        }
        
    </style>
</head>
<body>

<button type="button" class="btn btn-danger btn-feedback" data-bs-toggle="modal" data-bs-target="#feedbackModal">
    Give Feedback
</button>

<style>
    .btn-feedback {
        display: block;  /* Button ko block element banaya */
        margin: 0 auto;  /* Horizontally center align */
        text-align: center;
    }
</style>

<!-- Feedback Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Got a Feedback?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>We value your feedback. Please share your thoughts with us!</p>
                <form action="{{ route('admin.feedbacks.store') }}" method="POST">
                        @csrf
                        @foreach($feedbacks as $feedback)
            @foreach(json_decode($feedback->fields, true) as $index => $field)
                            <div>
                                <input type="text" name="{{ $field['name'] }}" class="form-control" placeholder="{{ $field['placeholder'] }}" required />
                            </div>
                        @endforeach
                        @endforeach
                        <div class="modal-footer">
                            <button type="submit">
                                Send Feedback
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
