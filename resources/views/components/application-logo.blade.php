<svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 100 100">
  <!-- Circle border -->
  <circle cx="50" cy="50" r="45" stroke="#60A5FA" stroke-width="5" fill="white" />
  
  <!-- Task list lines with animation -->
  <line x1="20" y1="30" x2="80" y2="30" stroke="#60A5FA" stroke-width="4" stroke-dasharray="60" stroke-dashoffset="60">
    <animate attributeName="stroke-dashoffset" from="60" to="0" dur="1s" begin="0.3s" fill="freeze" />
  </line>
  <line x1="20" y1="50" x2="80" y2="50" stroke="#60A5FA" stroke-width="4" stroke-dasharray="60" stroke-dashoffset="60">
    <animate attributeName="stroke-dashoffset" from="60" to="0" dur="1s" begin="1s" fill="freeze" />
  </line>
  <line x1="20" y1="70" x2="80" y2="70" stroke="#60A5FA" stroke-width="4" stroke-dasharray="60" stroke-dashoffset="60">
    <animate attributeName="stroke-dashoffset" from="60" to="0" dur="1s" begin="1.7s" fill="freeze" />
  </line>
</svg>
