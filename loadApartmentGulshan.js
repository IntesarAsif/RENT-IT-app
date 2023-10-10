document.addEventListener('DOMContentLoaded', function () {
    // Function to load content from a given URL and inject it into a specified element
    async function loadAndInjectContent(url, elementId) {
        try {
            const response = await fetch(url);
            if (!response.ok) {
                throw new Error(`Error fetching ${url}: ${response.status} ${response.statusText}`);
            }
            const content = await response.text();
            document.getElementById(elementId).innerHTML = content;
        } catch (error) {
            console.error(error);
        }
    }


    loadAndInjectContent('a4d.html', 'apartment4');
    loadAndInjectContent('a5d.html', 'apartment5');

});
