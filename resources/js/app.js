import './bootstrap';

import Alpine from 'alpinejs';
import 'remixicon/fonts/remixicon.css'
import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/animations/scale.css';
import dayjs from 'dayjs'
import duration from 'dayjs/plugin/duration'
import relativeTime from 'dayjs/plugin/relativeTime'
dayjs.extend(duration)
dayjs.extend(relativeTime)

window.Alpine = Alpine;
window.dayjs = dayjs

Alpine.start();

tippy('[data-tippy-content]', {
    animation: 'scale',
})
