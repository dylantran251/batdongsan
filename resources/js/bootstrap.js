// Load plugins
import $ from 'jquery'
import axios from 'axios'
import helper from './helper'

// Set plugins globally
window.$ = window.jQuery = $
window.axios = axios
window.helper = helper

// CSRF token
let token = document.head.querySelector('meta[name="csrf-token"]')
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

window.axiosInstance = axios.create();
axiosInstance.interceptors.response.use(
    (response) => {
        // Return the response for successful requests
        return response;
    },
    (error) => {
        // Handle errors globally
        if (error.response) {
            // The request was made, but the server responded with an error status code (e.g., 4xx, 5xx)
            console.error('Lỗi server:', error.response.status, error.response.data);
        } else if (error.request) {
            // The request was made, but no response was received (e.g., network error)
            console.error('Lỗi kết nối:', error.message);
        } else {
            // Something happened in setting up the request (e.g., request configuration error)
            console.error('Yêu cầu thất bại:', error.message);
        }
        fireToast('error', "Lỗi", error.message)
        // Pass the error along to the next catch block
        return Promise.reject(error);
    }
);


