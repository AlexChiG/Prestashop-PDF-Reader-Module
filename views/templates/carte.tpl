    <link rel="stylesheet" href="/modules/pdfReader/views/css/styles.css" />
    <script src="/modules/pdfReader/views/js/index.js"></script>

        <div id="loader">Loading ......</div>
        <canvas id="pdf_canvas"></canvas>
        <div class="container">
                <button id="prev_page">Previos Page</button>
                <button id="next_page">next Page</button>
                <span id="current_page_num"></span>
                    of
                <span id="total_page_num"></span>
                    
                <input type="text" id="page_num">
                <button id="go_to_page">Go To Page</button>
        </div>
        
        <!-- Replace pdf.js with downloaded pdf.js file -->
        <script src="//mozilla.github.io/pdf.js/build/pdf.js"></script>
