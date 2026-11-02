@php
$paths = [
'faq' => 'M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18zM9.5 9.5a2.5 2.5 0 1 1 3.5 2.3c-.6.3-1 .8-1 1.5M12 17h.01',
'trust' => 'M12 3l8 3v6c0 4.5-3.2 8-8 9-4.8-1-8-4.5-8-9V6l8-3zM8.5 12l2.5 2.5 4.5-5',
'steps' => 'M8 6h12M8 12h12M8 18h12M4 6h.01M4 12h.01M4 18h.01',
'features' => 'M4 4h7v7H4zM13 4h7v7h-7zM4 13h7v7H4zM13 13h7v7h-7z',
'screens' => 'M4 5h16v14H4zM4 16l5-5 4 4 3-3 4 4M9 9h.01',
'voice' => 'M12 3a3 3 0 0 0-3 3v6a3 3 0 0 0 6 0V6a3 3 0 0 0-3-3zM5 11a7 7 0 0 0 14 0M12 18v3',
'security' => 'M6 11h12v9H6zM8 11V8a4 4 0 0 1 8 0v3',
'quote' => 'M4 5h16v11H9l-5 4V5z',
'settings' => 'M4 7h10M18 7h2M4 17h2M10 17h10M14 5v4M6 15v4',
'external' => 'M14 4h6v6M20 4l-9 9M18 14v5H5V6h5',
'logout' => 'M10 4H5v16h5M15 8l4 4-4 4M19 12H9',
'plus' => 'M12 5v14M5 12h14',
'restore' => 'M3 4v6h6M4.5 15a8 8 0 1 0 1.8-8.4L3 10',
'pencil' => 'M4 20h4L19 9l-4-4L4 16v4z',
'trash' => 'M5 7h14M9 7V4h6v3M7 7l1 13h8l1-13',
'eye'   => 'M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12zM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6z',
'check' => 'M5 12l5 5 9-10',
'mail'  => 'M3 5h18v14H3zM3 7l9 6 9-6',
'users'    => 'M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2M9 11a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM22 21v-2a4 4 0 0 0-3-3.9M16 3.1a4 4 0 0 1 0 7.8',
'download' => 'M12 4v11M7 11l5 5 5-5M4 20h16',
];
@endphp
<svg class="ico" viewBox="0 0 24 24" aria-hidden="true"><path d="{{ $paths[$name] ?? '' }}"/></svg>
