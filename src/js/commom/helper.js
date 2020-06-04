/**
 * Reloads the page
 */
export function reloadPage() {
    window.location.reload();
}


/**
 * Gets the base site url with protocol
 * Eg. http://localhost/
 * @returns {string}
 */
export function getSiteUrl() {
    return `${window.location.protocol}//${window.location.hostname}`;

}

/**
 * Redirects to the given url path
 * @param path
 */
export function redirect(path) {
    location.replace(path);
}
