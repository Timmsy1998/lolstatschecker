import 'bootstrap';

import axios from 'axios';
window.axios = axios;

import React from 'react';
import ReactDOM from 'react-dom/client';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

