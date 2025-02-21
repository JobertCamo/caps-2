<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/styles/atom-one-dark.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.7.0/highlight.min.js"></script>
    <script>hljs.highlightAll();</script>
    @livewireStyles
</head>
<body class="lg:flex lg:justify-center lg:items-center bg-[#021526]" >
    <div  class="bg-[#021526] p-3 text-white space-y-3 w-auto lg:w-[650px]">
        <div class="text-2xl font-bold">Employee List API</div>
        <div class="text-xl font-bold">Laravel</div>
        <div class="space-y-2">
            <div class="text-xl">First step is to install the guzzlehttp/guzzle.</div>
            <p class="bg-[#282c34] p-3">composer require guzzlehttp/guzzle</p>
        </div>
        {{--  --}}
        <div class="space-y-2">
            <div class="text-xl">How to use</div>
            <div>Fetch API using Laravel</div>
            <pre >
<code class="language-php">
$token = 'API TOKEN HERE';  //Insert your token here contact julius for token
$response = Http::withToken($token)
->get('https://hr1.gwamerchandise.com/api/employee/');


if ($response->successful()) {
$data = $response->json(); // Convert API response to an array
return view('welcome', compact('data')); // Pass data into your blade file
} else {
return back()->with('error', 'Failed to fetch employee data.');
}
</code>
            </pre>
        </div>
        {{--  --}}
        {{--  --}}
        <div class="space-y-2">
            <div class="text-xl">In your blade file</div>
            <div>display in your table</div>
            <pre >
    <code class="language-html">
&lt;tbody&gt;
&#64;foreach ($data as $employee)
    &lt;tr class="border-b"&gt;
        &lt;td class="p-3"&gt;&#123;&#123; $employee['first_name'] ?? 'N/A' &#125;&#125; &#123;&#123; $employee['last_name'] ?? '' &#125;&#125;&lt;/td&gt;
        &lt;td class="p-3"&gt;&#123;&#123; $employee['email'] ?? 'N/A' &#125;&#125;&lt;/td&gt;
        &lt;td class="p-3"&gt;&#123;&#123; $employee['gender'] ?? 'N/A' &#125;&#125;&lt;/td&gt;
        &lt;td class="p-3"&gt;&#123;&#123; $employee['birth_date'] ?? 'N/A' &#125;&#125;&lt;/td&gt;
        &lt;td class="p-3"&gt;&#123;&#123; $employee['contact'] ?? 'N/A' &#125;&#125;&lt;/td&gt;
        &lt;td class="p-3"&gt;&#123;&#123; $employee['job_position'] ?? 'N/A' &#125;&#125;&lt;/td&gt;
        &lt;td class="p-3"&gt;&#123;&#123; $employee['salary'] ?? 'N/A' &#125;&#125;&lt;/td&gt;
        &lt;td class="p-3"&gt;&#123;&#123; $employee['department'] ?? 'N/A' &#125;&#125;&lt;/td&gt;
        &lt;td class="p-3"&gt; 
            &lt;a href="/test/&#123;&#123; $employee['id'] &#125;&#125;"&gt; &#123;&#123; $employee['id'] ?? 'N/A' &#125;&#125; &lt;/a&gt;
        &lt;/td&gt;
    &lt;/tr&gt;
&#64;endforeach
&lt;/tbody&gt;
    </code>
            </pre>
        </div>
        {{--  --}}
<hr>
<div>
    <li class="text-sm">https://hr1.gwamerchandise.com/api/employee/{id} <span class="text-xl text-red-400">View data using GET method</span></li>
    <li class="text-sm">https://hr1.gwamerchandise.com/api/employee/{id} <span class="text-xl text-red-400">Update data using PATCH method</span></li>
    <div>Note: <span>only email, contact, salary, job_position, department fieds can be updated</span></div>
</div>
<hr>
        <div class="text-xl font-bold">PHP</div>
        <div class="space-y-2">
            <div class="text-xl">How to use</div>
            <div>Fetch API using PHP</div>
            <pre >
<code class="language-php">
$url = "https://hr1.gwamerchandise.com/api/employee/"; 
$token = "API TOKEN HERE"; //Insert your token here contact julius for token

$options = [
    "http" => [
        "header" => "Authorization: Bearer $token\r\n" .
                    "Content-Type: application/json\r\n",
        "method" => "GET"
    ]
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);
$data = json_decode($response, true);
</code>
            </pre>
        </div>
        
        <div class="space-y-2">
            <div class="text-xl">In your HTML</div>
            <div>Display data in your html</div>
            <pre>
<code class="language-php">
&lt;?php if (!empty($data)): ?&gt;
&lt;table border=1&gt;
    &lt;tbody&gt;
        &lt;?php foreach ($data as $employee): ?&gt;
            &lt;tr&gt;
                &lt;td&gt;&lt;?= $employee['id'] ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $employee['first_name'] ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $employee['middle_name'] ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $employee['last_name'] ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $employee['email'] ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $employee['gender'] ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $employee['birth_date'] ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $employee['contact'] ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $employee['job_position'] ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $employee['salary'] ?&gt;&lt;/td&gt;
                &lt;td&gt;&lt;?= $employee['department'] ?&gt;&lt;/td&gt;
            &lt;/tr&gt;
        &lt;?php endforeach; ?&gt;
    &lt;/tbody&gt;
&lt;/table&gt;
&lt;?php else: ?&gt;
&lt;p&gt;No data found.&lt;/p&gt;
&lt;?php endif; ?&gt;
</code>
            </pre>
        </div>
    </div>
    <div class="self-start">

    </div>
    @livewireScripts
</body>
</html>