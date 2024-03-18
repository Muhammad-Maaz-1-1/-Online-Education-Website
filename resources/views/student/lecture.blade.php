@include('student.layouts.header')
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.lectureSECTION {
    padding: 20px;
}

.lecture-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px;
}

.lecture-item {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

h2 {
    margin-bottom: 10px;
}

video {
    width: 100%;
    border-radius: 5px;
}

</style>
<div class="lectureSECTION">
    <h1>Lectures</h1>
    <div class="lecture-container">
        @foreach($enrollment as $key => $value)
            
        <div class="lecture-item">
            <h2>{{ $value->lecture->title }}</h2>
            <video controls>
                <source src="" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        @endforeach
        
        <!-- Add more lecture items as needed -->
    </div>
</div>

@include('student.layouts.footer')