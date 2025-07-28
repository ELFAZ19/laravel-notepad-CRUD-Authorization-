<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>my Note | Simple. Focused. Yours.</title>

    <!-- Font: Instrument Sans (from your file) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500" rel="stylesheet" />

    <!-- Inline Tailwind-inspired styles (light/dark mode) -->
    <style>
        :root {
            --font-sans: 'Instrument Sans', system-ui, sans-serif;
            --color-primary: #F53003;
            --color-bg: #FDFDFC;
            --color-text: #1B1B18;
            --color-card: #FFFFFF;
            --color-border: #e3e3e0;
            --shadow-inset: inset 0px 0px 0px 1px rgba(26, 26, 0, 0.16);
        }

        @media (prefers-color-scheme: dark) {
            :root {
                --color-bg: #0a0a0a;
                --color-text: #EDEDEC;
                --color-card: #161615;
                --color-border: #3E3E3A;
                --shadow-inset: inset 0px 0px 0px 1px #fffaed2d;
            }
        }

        body {
            font-family: var(--font-sans);
            background-color: var(--color-bg);
            color: var(--color-text);
            transition: background-color 0.3s ease, color 0.3s ease;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            text-align: center;
        }

        .card {
            max-width: 500px;
            width: 100%;
            padding: 2rem;
            border-radius: 0.75rem;
            background: var(--color-card);
            box-shadow: var(--shadow-inset);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        h1 {
            font-weight: 500;
            font-size: 1.75rem;
            margin-bottom: 1rem;
            color: var(--color-text);
        }

        p {
            color: #706f6c;
            dark:color: #A1A09A;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            text-decoration: none;
            margin: 0 0.5rem;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: #F53003;
            color: white;
            border: 1px solid #F53003;
        }

        .btn-primary:hover {
            background-color: #e02a00;
            border-color: #e02a00;
        }

        .btn-outline {
            border: 1px solid var(--color-border);
            color: var(--color-text);
            background: transparent;
        }

        .btn-outline:hover {
            border-color: #F53003;
            color: #F53003;
        }

        @media (prefers-color-scheme: dark) {
            .btn-outline:hover {
                border-color: #F61500;
                color: #F61500;
            }
        }
    </style>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1B1B18] dark:text-[#EDEDEC]">

    <div class="card">
        <h1>Write freely. Think clearly.</h1>
        <p>
            My Note is a minimalist note-taking app designed to keep your thoughts organized — without distractions.
        </p>

        <div>
            <a href="/login" class="btn btn-primary">Let log in</a>
            <a href="/register" class="btn btn-outline">let us start together</a>
        </div>
    </div>

    <footer style="margin-top: 2rem; font-size: 0.875rem; color: #706f6c; dark:color: #A1A09A;">
        &copy; 2025 NoteSpace. Simple by design.
    </footer>

</body>
</html>