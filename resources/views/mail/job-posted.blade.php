<h2>Hello {{ $job->employer->name }},</h2>
<p>Congrats! Your job is now live on the site.</p>

<p>Here are the details:</p>
<ul>
    <li>Title: {{ $job->title }}</li>
    <li>Salary: {{ $job->salary }}</li>
</ul>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View Job</a>
</p>
