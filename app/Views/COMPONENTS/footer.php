<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        footer {
            background-color: #EF3340;
            color: #fff;
            padding: 20px;
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            align-items: flex-start;
            overflow-y: auto;
            font-family: 'Arial', sans-serif;
        }

        div {
            margin-top: 20px;
            margin-bottom: 20px; /* Added bottom margin for spacing */
        }

        p {
            font-size: 14px;
            margin: 0;
        }

        .small {
            font-size: 12px;
        }

        .font-weight-black {
            font-weight: bold;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0; /* Remove default margin for ul */
        }

        a {
            color: #fff;
            text-decoration: none;
            font-size: 14px;
        }

        a:hover {
            text-decoration: underline;
        }

        @media only screen and (max-width: 600px) {
            footer {
                padding: 10px;
                margin-top: 10px;
            }
        }

        .gov-links-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .gov-links-column {
            margin-right: 15px;
            flex: 1; /* Adjusted to take full available width */
        }

        /* Two-column layout for links on smaller screens */
        @media only screen and (max-width: 600px) {
            .gov-links-column {
                margin-right: 0;
                flex: 1 0 100%; /* Set to full width on smaller screens */
            }
        }
    </style>
</head>

<body>

    <footer>
        <div>
            <!-- <p class="small">&copy; 2023 Bureau of Fire Protection</p> -->
            <p class="small">REPUBLIC OF THE PHILIPPINES</p>
            <p class="small">All content is in the public domain unless otherwise stated.</p>
        </div>
        <div>
            <p class="small font-weight-black" style="text-align: center;">ABOUT GOVPH</p>
            <p class="small">Learn more about the Philippine government, its structure,</p>
            <p class="small">how government works, and the people behind it.</p>
        </div>
        <div>
            <p class="small font-weight-black" style="text-align: center;">GOV.PH</p>
            <ul>
                <li><a class="small" href="#">Open Data Portal</a></li>
                <li><a class="small" href="#">Official Gazette</a></li>
            </ul>
        </div>
        <div >
            
            <ul><p class="small font-weight-black" style="text-align: center;">GOVERNMENT LINKS</p>
                <li><a class="small " href="#">Office of the President</a></li>
                <li><a class="small " href="https://www.ovp.gov.ph/">Office of the Vice President</a></li>
                <li><a class="small" href="#">Senate of the Philippines</a></li>
                <li><a class="small" href="#">House of Representatives</a></li>
                <li><a class="small" href="#">Supreme Court</a></li>
                <li><a class="small" href="#">Court of Appeals</a></li>
                <li><a class="small" href="#">Sandiganbayan</a></li>
            </ul>
        </div>
    </footer>

</body>

</html>
