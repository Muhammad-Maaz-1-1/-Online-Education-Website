@include('admin.layouts.header')
<style>
    .lecture {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    .lecture .container, .lecturesShow {
        max-width: 800px;
        margin: 20px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .lecture h1 {
        text-align: center;
        margin-bottom: 20px;
    }

    .lecture .form-group {
        margin-bottom: 15px;
    }

    .lecture label {
        display: block;
        margin-bottom: 5px;
    }

    .lecture input[type="text"],
    .lecture input[type="file"],
    .lecture textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    .lecturetextarea {
        height: 150px;
    }

    .lecture input[type="submit"] {
        background-color: #4CAF50;
        color: #fff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 3px;
    }

    .lecture input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>

<div class="lecture">

    <div class="container">
        <h1>Add Lectures</h1>
        <form id="lectureForm" action="{{ route('lecture_submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="course_id" value="{{ $course_id }}">
            <div class="form-group">
                <label for="title">Lecture Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="video">Add Video </label>
                <input type="file" name="videos[]" multiple accept="video/*" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" id="submitBtn" value="Add Lecture">
            </div>
            <div id="loadingMessage" style="display: none;">
                <p>Loading...</p>
                <!-- You can also add a spinner icon or animation here -->
            </div>

            <style>
                #loadingMessage {
                    position: fixed;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background-color: rgba(255, 255, 255, 0.8);
                    padding: 20px;
                    border-radius: 5px;
                    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
                    z-index: 1000;
                }
            </style>
        </form>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const loadingMessage = document.getElementById('loadingMessage');
                const lectureForm = document.getElementById('lectureForm');

                // Show loading message when form is submitted
                lectureForm.addEventListener('submit', function(event) {
                    event.preventDefault(); // Prevent the default form submission
                    loadingMessage.style.display = 'block';

                    // Simulate form submission using fetch or AJAX
                    fetch(lectureForm.action, {
                            method: lectureForm.method,
                            body: new FormData(lectureForm)
                        })
                        .then(response => response.json()) // Assuming the server returns JSON response
                        .then(data => {
                            loadingMessage.style.display = 'none'; // Hide loading message
                            lectureForm.reset(); // Clear form fields
                            alert(data.message); // Display success message (replace with your own logic)
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            loadingMessage.style.display = 'none'; // Hide loading message
                            alert(
                            'Error occurred. Please try again.'); // Display error message (replace with your own logic)
                        });
                });
            });
        </script>
    </div>

</div>

<style>
    /* Table styles */
.lecturesShow .table {
    width: 100%;
    border-collapse: collapse;
}

.lecturesShow .table th,
.lecturesShow .table td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

/* Table header styles */
.lecturesShow .table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #333;
}

/* Table row styles */
.lecturesShow .table tr {
    transition: background-color 0.3s;
}

/* Hover effect for table rows */
.lecturesShow .table tr:hover {
    background-color: #f9f9f9;
}

</style>

<div class="lecturesShow">
 
    <table id="lecture-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Video</th>
            </tr>
        </thead>
        <tbody id="lecture-list">
            @foreach($course as $key => $value)
                <tr>
                    <td>{{ $value->title }}</td>
                    <td>
                        <video src="{{ asset('uploads/' . $value->videos) }}" controls></video>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const courseId = {{ $course_id }};
        const lectureTableBody = document.getElementById('lecture-list');

        // Function to load data using Fetch
        function loadData(courseId) {
            fetch(`/admin/lectures/${courseId}`)
                .then(response => response.json())
                .then(data => {
                    // Clear existing data
                    lectureTableBody.innerHTML = '';

                    // Append new lecture data
                    data.course.forEach(lecture => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${lecture.title}</td>
                            <td>
                                <video src="${lecture.video_url}" controls></video>
                            </td>
                        `;
                        lectureTableBody.appendChild(row);
                    });

                    // Update user name and course ID if needed
                    document.getElementById('user-name').textContent = data.user.name;
                    document.getElementById('course-id').textContent = data.course_id;
                })
                .catch(error => console.error('Error fetching data:', error));
        }

        // Call the function initially to load data for the specified course ID
        loadData(courseId);
    });
</script>

@include('admin.layouts.footer')
