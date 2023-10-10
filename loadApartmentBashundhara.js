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

    loadAndInjectContent('a1d.html', 'apartment1');
    loadAndInjectContent('a6d.html', 'apartment6');
});
