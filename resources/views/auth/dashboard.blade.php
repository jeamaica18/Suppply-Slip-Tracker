<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

 

    <style>
        /* Apply styles to the entire page */
        body {
            background: linear-gradient(to bottom, #cfe2ff, #74a8fc);
            min-height: 97.5vh;
            display: flex;
        }

        /* Sidebar Container */
        .sidebar {
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            position: fixed;
            width: 180px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5); /* Adjust the values as needed */
            text-align: center;
            left: 20px;
            top: 13px;
            bottom: 12px;
            justify-content: flex-start;
            z-index: 1000;
        }

        /* Admin profile symbol */
        .avatar-container {
            text-align: center;
            margin-top: 20px;
            position: relative;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            background: url('/images/prof.png') no-repeat center center/cover; /* Permanent image */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Center Admin button */
        .admin-button {
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px; /* Set width to 445px */
            height: 25px; /* Set height to 250px */
            background: #2A577E; /* Set background color */
            border: none; /* Remove border */
            border-radius: 40px;
        }

        .admin-button button {
            color: white; /* Set text color to white */ 
            font-weight: 700; /* Set font weight to bold */ 
            background-color: inherit !important;
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            border: none;
        }

        /* Sidebar menu */
        .menu {
            flex-grow: 1; /* Takes available space */
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0;
            width: 100%;    
            margin-top: 50px;
            gap: 16px;
        }
        .menu li {
            width: 100%;
            padding: 6px 20px; /* Add padding to match sidebar padding */
            display: flex;
            align-items: center;
            gap: 20px; /*spacing*/
            cursor: pointer;
            justify-content: flex-start; /* Align items to the left */  
        }
        .menu li:hover {
            background: linear-gradient(to right, #beddf8, #c1dff7); /* Same hover effect */
            font-weight: bold;
            position: relative;
            border-radius: 4px;
        }
        .menu li:hover::after {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px; /* Thin vertical line */
            height: 100%; /* Shorter height */
            background-color: #1E4565;
            border-radius: 2px;
        }
        .menu li.active {
            background: linear-gradient(to right, #beddf8, #c1dff7);
            font-weight: bold;
            position: relative;
        }
        .menu li.active::before {
            content: "";
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px; /* Thicker line */
            height: 100%; /* Adjust height to fit the menu item */
            background-color: #1E4565; /* Dark color */
            border-radius: 3px;
        }

        .menu li:hover span {
            font-weight: bold; /* Make the font bold on hover */
            font-size: 1.2em; /* Increase font size on hover */
        }

        .menu li span {
            font-family: 'Poppins', sans-serif;
            color: #41779C;
            font-weight: normal; /* Ensure the font is not bold */
        }
        .menu li.active{
            position: relative;
            background: linear-gradient(to right, #beddf8, #c1dff7); /* Same hover effect */
            font-weight: bold;
        }

        /* Logout button */
        .logout {
            margin-top: auto;
            font-size: 14px;
            color: #41779C;
            cursor: pointer;
            background: url('/images/logout.png') no-repeat left center/20px 20px;
            padding-left: 30px; /* Add padding to the left to make space for the image */
            font-family: 'Poppins', sans-serif;
        }

        /* Make the logo image bigger */
        .logo-container img {
            width: 50px;
            height: 50px;
            background-color: transparent;
            filter: drop-shadow(0px 0px 4px rgba(0, 0, 0, 0.5)); /* Circular shadow */
            border-radius: 50%; /* Optional: smooth edges */
            display: block;
            background-color: transparent;
        }
        .logout-button:hover {
            font-weight: bold;
            width: 100%; /* Keeps the hover effect inside the sidebar */
            background-color: 0.3s ease-in-out;
            padding-left: 35px; /* Subtle shift */
            font-weight: bold; /* Make text bold */
        }
        /* Main content container */
        .main-content {
            margin: 60px 20px 20px -275px; /*adjust the size of the box 60:left, 20:right, 65:bottom, -275:left */
            background: white;
            border-radius: 10px;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
            margin-top: 60px;
   

            flex-grow: 1; /* Allows it to expand inside a flex container */
            display: flex;
            flex-direction: column;
            height: auto;
            position: relative; /* Ensures proper positioning */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-container">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 55px; height: 55px;"> <!-- Add your logo image here -->
        </div>
        <div class="avatar-container">
        </div>
        <div class="admin-button">
            <button class="bg-[#2A577E] text-white font-bold px-4 py-2 rounded-lg hover:bg-[#1E4565]">Admin</button>
        </div>
        <ul class="menu">
            <li>
                <img src="{{ asset('images/record.png') }}" alt="Record icon" style="width: 20px; height: 20px; margin-right: 10px;">
                <span>Records</span>
            </li>

            <li>
                <img src="{{ asset('images/checklist.png') }}" alt="Checklist icon" style="width: 20px; height: 20px; margin-right: 10px;">
                <span>Checklist</span>
            </li>

            <li>
                <img src="{{ asset('images/account.png') }}" alt="Account icon" style="width: 20px; height: 20px; margin-right: 10px;">
                <span>Account</span>
            </li>
        </ul>

        <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-button">
                Logout
                </button>
            </form>
            </div>

            <style>
            .logout-button {
                margin-top: auto;
                font-size: 14px;
                color: #41779C;
                cursor: pointer;
                background: url('/images/logout.png') no-repeat left center/20px 20px;
                padding-left: 30px; /* Add padding to the left to make space for the image */
                font-family: 'Poppins', sans-serif;
                border: none;
                background-color: transparent;
            }
            </style>

<div class="main-container">
    <h2 class="page-header">Supply Slip Tracker System</h2>
</div>


    <style>
          .page-header {
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            font-weight: normal;
            color: #41779C;

            display: flex; 
            justify-content: flex-end; /* Moves text to the right */
            padding: 220px; /* Align with main-content */
            
            margin-top: -212px; /*kung gusto e sibog ang text nga Supply Tracker chuchu*/
            margin-left: 40px;
            padding-right: 40px; /* Adjust right spacing */
            z-index: 10;

          }
          .main-content {
            font-weight: bold;
            font-family: 'Poppins', sans-serif;
            font-size: 18px;
            color: #1B4568;
            justify-content: flex-start;
          }
          .search-container {
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 3px 8px;
            width: 300px;
            height: 25px;
            position: relative;
            margin-left: 25px; 
            position: relative;
            margin-bottom: 16px;
          
        }
        .search-box {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 16px; /* Add space below the search box */
        }
        .no-results {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: gray;
            font-size: 14px;
            font-style: italic;
        }

        .search-container input {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: none;
            padding: 5px 10px 5px 40px; 
            font-size: 14px;
            background-size: 14px;
        }

        .search-container button {
            position: absolute;
            left: 10px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        .search-container button img {
            width: 19px;
            height: 19px;
        }
        .button-container {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-left: 690px;
            margin-top: -39px;
            position: absolute;
            margin-bottom: 16px;
        }
        .export-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background-color: #0066cc;
            color: white;
            border: none;
            border-radius: 7px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            height: 29px;
            width: 90px;
            margin-left: 70%;
            margin-top: -10px;
           
        }
        .filter-button {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background-color: white;
            color: #333;
            border: 1px solid #ddd;
            border-radius: 7px;
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            height: 29px;
            width: 90px;
            margin-top: -10px;
        }
        .export-button svg, .filter-button svg {
            stroke-width: 2px;
        }
        .export-button:hover {
            background-color: #0055b3;
        }
        .filter-button:hover {
            background-color: #f5f5f5;
        }
        .header-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 10px;
        }
        .container {
      max-width: 1150px;
      margin: 0 auto;
      top: 70px;
    }
    
    .table-container {
      border-radius: 8px;
      margin-left: 30px;
    }
    
    table {
        width: 95%;
        border-collapse: collapse;
    }
    thead {
      background-color: #f9fbf9;
      text-align: left !important;
      color: #1e293b; /* Change header text color */
    }
    th {
      color: #687588; /* Change header text color */
      font-weight: bold; /* Optional: Make header text bold */
      font-family: 'Poppins', sans-serif; /* Consistent font */
      text-align: left !important; /* Ensure text stays left-aligned */
      font-size: 17px; /* Font size for header */
      text-transform: capitalize; /* Capitalize header text */
      letter-spacing: 0.05em; /* Add slight letter spacing */
      border-bottom: 1px solid #e5e7eb; /* Add border below header */  
    }
    td {
      color: black; /* Default text color for table data */
      font-weight: normal; /* Keep text normal weight */
      font-family: 'Poppins', sans-serif; /* Consistent font */
      text-align: left !important; /* Keep text left aligned */
      font-size: 16px; /* Font size for content */
      text-transform: capitalize; /* Capitalize text */
      letter-spacing: 0.05em; /* Slight letter spacing */
      border-bottom: 1px solid #e5e7eb; /* Add border below each row */
      white-space: nowrap; /* Prevent text wrapping */
      width: 100px; /* Set default column width */    
    }
    th, td {
      font-family: 'Poppins', sans-serif;
    }
    th:first-child, td:first-child {
      width: 40px; /* Set a fixed width for the checkbox column */ 
      text-align: center !important;

    }
    th:last-child, td:last-child {
      width: 120px; /* Control the width of the action column */
      text-align: center;
    }
    /* Adjust spacing for dynamic columns */
    th:nth-child(2), td:nth-child(2), /* Date */
    th:nth-child(3), td:nth-child(3), /* Quantity */
    th:nth-child(4), td:nth-child(4), /* Unit */
    th:nth-child(5), td:nth-child(5), /* Particulars */
    th:nth-child(6), td:nth-child(6) { /* Requested by */
      width: auto; /* Allow these columns to auto-adjust */
      text-align: left;
    }
    tr:hover {
      background-color: #eff6ff;
      transition: background-color 0.2s;
    }
    .sort-container {   /*dropdown arrow and the date text*/
      display: flex;
      align-items: center;
      cursor: pointer;
      position: relative;
     
    }
    
    .chevron {      /*dropdown arrow*/
      margin-left: 4px;
      width: 16px;
      height: 16px;
      position: absolute;
      left: 70%; /* Position chevron to the left */
    }
    
    .dropdown {
      position: absolute;
      top: 100%;
      left: 0;
      margin-top: 4px;
      background-color: white;
      border: 1px solid #e5e7eb;
      border-radius: 4px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      z-index: 10;
      display: none;
    }
    
    .dropdown.show {
      display: block;
    }
    
    .dropdown ul {
      list-style: none;
      padding: 4px 0;
    }
    
    .dropdown li {
      padding: 8px 16px;
      font-size: 14px;
      cursor: pointer;
    }
    
    .dropdown li:hover {
      background-color: #f3f4f6;
    }
    
    .action-buttons {
      display: flex;
      gap: 8px;
      justify-content: center; /* Center the action buttons */
      margin-left: -27px;
    }
    
    .action-button {
      width: 25px;
      height: 25px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 4px;
      border: none;
      cursor: pointer;
      transition: transform 0.2s;
    
    }
    
    .action-button:hover {
      transform: scale(1.05);
    }
    
    .view-button {
      background-color: #FEB000;
      color: #ffffff;
      border-radius: 8px;
    }
    
    .view-button:hover {
      background-color: #fde68a;
    }
    
    .edit-button {
      background-color: #006EC4;
      color: #ffffff;
      border-radius: 8px;
    }
    
    .edit-button:hover {
      background-color: #bfdbfe;
    }
    
    .delete-button {
      background-color: #E03137;
      color: #ffffff;
      border-radius: 8px;
    }
    
    .delete-button:hover {
      background-color: #fecaca;
    }
    
    .pagination-container {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      gap: 300px; /* Optional: Add space between elements */
      margin-top: 10px; /* Increase to move it further down */
      margin-left: 15%;
      padding-top: 5px; /* Optional: Adds space inside the container */
    }
    
    .pagination-info {
      font-size: 10px;
      color: #A2A1A8;
      font-weight: normal;
      margin-left: 10%;
    }
    
    .pagination {
      display: flex;
      justify-content: center;
      flex: 1;
    }
    
    .pagination-nav {
      display: inline-flex;
      border-radius: 5px;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    }
    
    .page-item {
      display: inline-flex;
      align-items: center;
      padding: 10px 15px;
      border: 1px solid transparent; /* Default transparent border */
      margin-left: -1px;
      font-size: 9px;
      text-decoration: none;
      cursor: pointer;
      font-weight: normal;
      transition: all 0.2s ease-in-out;
    }
    .page-item:hover {
        background-color: transparent; /* Keep background transparent */
        border-color: #006EC4; /* Blue border on hover */
        border-radius: 10px;
        font-weight: bold; /* Make text bold */
        transform: scale(0.95); /* Shrink slightly on hover */
        transition: all 0.2s ease-in-out; /* Smooth transition */
    }
    .page-item:first-child {
      border-top-left-radius: 6px;
      border-bottom-left-radius: 6px;
    }
    
    .page-item:last-child {
      border-top-right-radius: 6px;
      border-bottom-right-radius: 6px;
    }
    .page-item:not(.active) {
      background-color: white;
      color: #4b5563;
    }
    
    .page-item:not(.active):hover {
      background-color: #f9fafb;
    }
    .page-item:hover span, .page-item:hover a {
      font-weight: bold; /* Bold the number inside */
    }
    /* Shrink button and bold text on hover */
    .page-item:hover {
      transform: scale(0.95); /* Shrink slightly */
      transition: all 0.2s ease-in-out; /* Smooth transition */
    }
    /* Optional: Active page style */
    .page-item.active span, .page-item.active a {
      font-weight: bold; /* Keep the active number bold */
      color: #0066cc;
    }
    
    .checkbox {
      width: 16px;
      height: 16px;
      border-radius: 50%; /* Make checkbox circular */
      border: 1px solid #d1d5db;
      accent-color: #3b82f6;
      appearance: none;
      -webkit-appearance: none;
      position: relative;
      cursor: pointer;
      appearance: none;
      -webkit-appearance: none;
    }
    
    .checkbox:checked {
      background-color: #3b82f6;
      border-color: #3b82f6;
      
    }
    
    .checkbox:checked::after {
      content: '\2713'; /* Unicode for checkmark */
      font-size: 12px;
      color: rgb(255, 255, 255);
      font-weight: bold;
      position: absolute;
      width: 6px;
      height: 6px;
      border-radius: 50%;
      top: 12%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    
    .text-center {
      text-align: center;
    } 
    /* Row background for status */
    tr[data-status="pending"] {
      background-color: #f0f9ff; /* Light blue for pending */
    }
    tr[data-status="opened"] {
      background-color: #f0fdf4; /* Light green for opened */
    }
    /* Status badge styles */
    .status-badge {
      display: inline-block;
      padding: 4px 12px;
      font-size: 14px;
      font-weight: bold;
      border-radius: 12px;
      border-radius: 12px;
      border: 1px solid;
    }
    /* Pending Status */
    .status-pending {
      background-color: #eff6ff;
      color: #1e40af;
      border-color: #3b82f6;
    }
    /* Opened Status */
    .status-opened {
      background-color: #ecfdf5;
      color: #065f46;
      border-color: #10b981;
    }
</style>

<div class="main-content">
    <h4 class="mb-3"style="color: #1B4568; font-weight: bold; font-size: 18px; margin-left: 20px;">
        Withdrawal Records
    </h4>
    <div class="search-wrapper">
      <form action="{{ route('search.items') }}" method="GET" class="search-container">
        <input type="text" id="searchInput" name="search_bar" placeholder="Search name">
          <button type="submit">
              <img src="/images/search.png" alt="Search">
          </button>
      </  >
      <div class="button-container">
        <button class="export-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
            </svg>
            Export
        </button>
        <button class="filter-button">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="4" y1="6" x2="20" y2="6"></line>
                <circle cx="7" cy="6" r="2"></circle>
                 <line x1="4" y1="12" x2="20" y2="12"></line>
                 <circle cx="14" cy="12" r="2"></circle>
                 <line x1="4" y1="18" x2="20" y2="18"></line>
                 <circle cx="10" cy="18" r="2"></circle>
            </svg>
            Filter
        </button>
    </div>
      <div class="container">
        <div class="table-container">
          <table id="recordsTable">
              <thead>
                <tr>
                  <th></th> <!-- Empty header for checkbox column -->
                  <th>
                    <div class="sort-container" id="date-sort">
                      Date
                      <svg class="chevron" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#687588" stroke="#687588" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                      </svg>
                      <div class="dropdown" id="date-dropdown">
                        <ul>
                          <li data-sort="asc">Sort Ascending</li>
                          <li data-sort="desc">Sort Descending</li>
                          <li data-sort="clear">Clear Sorting</li>
                        </ul>
                      </div>
                    </div>
                  </th>
                  <th>Quantity</th>
                  <th>Unit</th>
                  <th>Particulars</th>
                  <th>Requested by</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="requests-body">
                <!-- Table content will be generated by JavaScript -->
              </tbody>
            </table>
          </div>
     
          <div class="pagination-container">
            <div class="pagination-info">
              Showing <span id="showing-from">1</span> to <span id="showing-to">10</span> out of <span id="total-count">40</span> records
            </div>
            <div class="pagination">
              <nav class="pagination-nav" aria-label="Pagination" id="pagination">
                <!-- Pagination will be generated by JavaScript -->
              </nav>
            </div>
          </div>
        </div>
      </div>
   <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById('searchInput');
            filter = input.value.toUpperCase();
            table = document.getElementById('recordsTable'); // Corrected table ID
            tr = table.getElementsByTagName('tr');

            for (i = 1; i < tr.length; i++) { // Skip header row
                td = tr[i].getElementsByTagName('td')[5]; // Column 5 = Requested by
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = '';
                    } else {
                        tr[i].style.display = 'none';
                    }
                }
            }
        });
    // Configuration
    const ITEMS_PER_PAGE = 10;
    
    // Generate mock data for 40 requests
    const generateAllRequests = () => {
      const allRequests = [];
      for (let i = 1; i <= 40; i++) {
        allRequests.push({
          id: i,
          date: '02/09/25',
          quantity: 10,
          unit: 'Pack',
          particulars: 'Kape',
          requestedBy: 'Engr. John Kristoffer Go',
          read: false
        });
      }
      return allRequests;
    };
    
    // State variables
    const allRequests = generateAllRequests();
    let currentPage = 1;
    let totalPages = Math.ceil(allRequests.length / ITEMS_PER_PAGE);
    let sortDirection = null;
    let selectedRows = {};
    let displayedRequests = [];
    
    // DOM Elements
    const requestsBody = document.getElementById('requests-body');
    const dateSort = document.getElementById('date-sort');
    const dateDropdown = document.getElementById('date-dropdown');
    const showingFrom = document.getElementById('showing-from');
    const showingTo = document.getElementById('showing-to');
    const totalCount = document.getElementById('total-count');
    const pagination = document.getElementById('pagination');
    
    // Functions
    function updateDisplayedRequests() {
      // Create a sorted copy of allRequests if sorting is active
      let sortedRequests = [...allRequests];
      
      if (sortDirection === 'asc') {
        sortedRequests.sort((a, b) => {
          const dateA = new Date(a.date);
          const dateB = new Date(b.date);
          return dateA - dateB;
        });
      } else if (sortDirection === 'desc') {
        sortedRequests.sort((a, b) => {
          const dateA = new Date(a.date);
          const dateB = new Date(b.date);
          return dateB - dateA;
        });
      }
      
      // Get requests for current page
      const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
      const endIndex = Math.min(startIndex + ITEMS_PER_PAGE, sortedRequests.length);
      displayedRequests = sortedRequests.slice(startIndex, endIndex);
    }
    
    function renderTable() {
      updateDisplayedRequests();
      
      requestsBody.innerHTML = '';
      
      displayedRequests.forEach(request => {
        const row = document.createElement('tr');
        
        // Checkbox column
        const checkboxCell = document.createElement('td');
        checkboxCell.className = 'text-center';
        
        // Add unread indicator if not read
        if (!request.read) {
          const unreadDot = document.createElement('span');
          unreadDot.className = 'unread';
          checkboxCell.appendChild(unreadDot);
        }
        
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.className = 'checkbox';
        checkbox.checked = !!selectedRows[request.id];
        checkbox.addEventListener('change', () => toggleRowSelection(request.id));
        checkboxCell.appendChild(checkbox);
        row.appendChild(checkboxCell);
        
        // Data columns
        const dateCell = document.createElement('td');
        dateCell.textContent = request.date;
        row.appendChild(dateCell);
        
        const quantityCell = document.createElement('td');
        quantityCell.textContent = request.quantity;
        row.appendChild(quantityCell);
        
        const unitCell = document.createElement('td');
        unitCell.textContent = request.unit;
        row.appendChild(unitCell);
        
        const particularsCell = document.createElement('td');
        particularsCell.textContent = request.particulars;
        row.appendChild(particularsCell);
        
        const requestedByCell = document.createElement('td');
        requestedByCell.textContent = request.requestedBy;
        row.appendChild(requestedByCell);
        
        // Actions column
        const actionsCell = document.createElement('td');
        const actionsDiv = document.createElement('div');
        actionsDiv.className = 'action-buttons';
        
        // View button
        const viewButton = document.createElement('button');
        viewButton.className = 'action-button view-button';
        viewButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>';
        viewButton.title = 'Preview';
        viewButton.addEventListener('click', () => {
          request.read = true;
          renderTable();
        });
        actionsDiv.appendChild(viewButton);
        
        // Edit button
        const editButton = document.createElement('button');
        editButton.className = 'action-button edit-button';
        editButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>';
        editButton.title = 'Edit';
        actionsDiv.appendChild(editButton);
        
        // Delete button
        const deleteButton = document.createElement('button');
        deleteButton.className = 'action-button delete-button';
        deleteButton.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>';
        deleteButton.title = 'Delete';
        actionsDiv.appendChild(deleteButton);
        
        actionsCell.appendChild(actionsDiv);
        row.appendChild(actionsCell);

        // Add row status attribute for coloring
        row.setAttribute('data-status', request.read ? 'opened' : 'pending');


        requestsBody.appendChild(row);
      });
      
      // Update info text
      const startItem = (currentPage - 1) * ITEMS_PER_PAGE + 1;
      const endItem = Math.min(startItem + displayedRequests.length - 1, allRequests.length);
      
      showingFrom.textContent = startItem;
      showingTo.textContent = endItem;
      totalCount.textContent = allRequests.length;
      
      renderPagination();
    }
    
    function renderPagination() {
      pagination.innerHTML = '';
      
      // Previous button
      const prevItem = document.createElement('a');
      prevItem.className = 'page-item';
      prevItem.innerHTML = '&lt;';
      prevItem.addEventListener('click', () => {
        if (currentPage > 1) {
          goToPage(currentPage - 1);
        }
      });
      pagination.appendChild(prevItem);
      
      // Page numbers
      const maxVisiblePages = 4;
      let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
      let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
      
      // Adjust start page if we're at the end
      if (endPage - startPage + 1 < maxVisiblePages && startPage > 1) {
        startPage = Math.max(1, endPage - maxVisiblePages + 1);
      }
      
      for (let i = startPage; i <= endPage; i++) {
        const pageItem = document.createElement('a');
        pageItem.className = `page-item ${i === currentPage ? 'active' : ''}`;
        pageItem.textContent = i;
        pageItem.addEventListener('click', () => goToPage(i));
        pagination.appendChild(pageItem);
      }
      
      // Next button
      const nextItem = document.createElement('a');
      nextItem.className = 'page-item';
      nextItem.innerHTML = '&gt;';
      nextItem.addEventListener('click', () => {
        if (currentPage < totalPages) {
          goToPage(currentPage + 1);
        }
      });
      pagination.appendChild(nextItem);
    }
    
    function goToPage(page) {
      if (page < 1 || page > totalPages) return;
      currentPage = page;
      renderTable();
    }
    
    function toggleDateDropdown() {
      dateDropdown.classList.toggle('show');
    }
    
    function sortByDate(direction) {
      sortDirection = direction === 'clear' ? null : direction;
      currentPage = 1; // Reset to first page when sorting
      renderTable();
      dateDropdown.classList.remove('show');
    }
    
    function toggleRowSelection(id) {
      selectedRows[id] = !selectedRows[id];
    }
    
    // Event Listeners
    dateSort.addEventListener('click', toggleDateDropdown);
    
    // Close dropdown when clicking outside
    document.addEventListener('click', (event) => {
      if (!dateSort.contains(event.target)) {
        dateDropdown.classList.remove('show');
      }
    });
    
    // Sort dropdown options
    dateDropdown.querySelectorAll('li').forEach(item => {
      item.addEventListener('click', () => {
        sortByDate(item.dataset.sort);
      });
    });
    
    // Initialize table
    renderTable();
  </script>
</body>
</html>
