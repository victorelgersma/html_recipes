<style>
  :root {
    --bg-color: #121212;
    --card-bg: #1e1e1e;
    --accent: #f7b538;
    --text: #e1e1e1;
    --muted: #a0a0a0;
  }

  /* Add this to the bottom of your <style> block in style.php */

  .search-container {
    margin-bottom: 2rem;
    width: 100%;
  }

  #recipeSearch {
    width: 100%;
    padding: 12px 20px;
    background-color: #2a2a2a;
    border: 2px solid #333;
    border-radius: 8px;
    color: var(--text);
    font-size: 1rem;
    outline: none;
    transition: border-color 0.2s;
  }

  #recipeSearch:focus {
    border-color: var(--accent);
  }

  #recipeSearch::placeholder {
    color: var(--muted);
  }

  .recipe-card {
    overflow: hidden;
    /* Keeps the image inside the border radius */
  }


  .card-image {
    width: 100%;
    height: 150px;
    background-size: cover;
    background-position: center;
    border-bottom: 1px solid #333;
  }

  .hero-image {
    width: 100%;
    max-height: 400px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 2rem;
  }

  .recipe-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    margin-top: 20px;
  }

  .gallery-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 6px;
  }

  ul li:has(input[type=checkbox]:checked) {
    text-decoration: line-through;
    color: var(--muted);
  }

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  a {
    color: var(--accent);
  }

  body {
    background-color: var(--bg-color);
    color: var(--text);
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    line-height: 1.6;
    padding: 0;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  h1 {
    color: var(--accent);
    text-align: center;
    margin-bottom: 1.5rem;
    font-size: 2.2rem;
    font-weight: 700;
  }

  h2 {
    color: var(--accent);
    margin: 2rem 0 1rem;
    font-size: 1.4rem;
    font-weight: 600;
  }

  ul,
  ol {
    list-style-position: inside;
    margin-bottom: 1.5rem;
    padding-left: 0.5rem;
    max-width: 550px;
    margin-left: auto;
    margin-right: auto;
    box-sizing: border-box;
  }

  ul {
    list-style: none;
  }

  li {
    width: 100%;
    margin-bottom: 0.85rem;
    position: relative;
    display: flex;
    align-items: flex-start;
  }

  /* Checkbox styling */
  input[type="checkbox"] {
    appearance: none;
    -webkit-appearance: none;
    width: 1.2rem;
    height: 1.2rem;
    border: 2px solid var(--accent);
    border-radius: 4px;
    background: transparent;
    position: relative;
    margin-right: 0.8rem;
    cursor: pointer;
    vertical-align: middle;
  }

  input[type="checkbox"]:checked {
    background-color: var(--accent);
  }

  input[type="checkbox"]:checked::before {
    content: "✓";
    position: absolute;
    color: var(--card-bg);
    font-size: 0.9rem;
    font-weight: bold;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  /* Improved checkbox and label alignment */
  li label {
    display: flex;
    align-items: flex-start;
    width: 100%;
  }

  li input[type="checkbox"] {
    margin-right: 8px;
    margin-top: 0.25rem;
    /* Align with first line of text */
    flex: 0 0 auto;
    /* Prevent checkbox from shrinking */
  }

  /* This creates the text block that will wrap properly */
  li label::after {
    content: "";
    display: block;
    flex: 1;
  }

  /* Instructions section */
  ol {
    counter-reset: item;
    list-style-type: none;
  }

  ol li {
    counter-increment: item;
    display: flex;
    align-items: flex-start;
  }

  ol li::before {
    content: counter(item) ".";
    color: var(--accent);
    font-weight: bold;
    margin-right: 0.5rem;
    min-width: 1.5rem;
    text-align: right;
  }

  /* Media queries for responsiveness */
  @media (max-width: 700px) {
    .container {
      padding: 1.5rem;
      margin: 1rem auto;
    }

    h1 {
      font-size: 1.8rem;
    }

    h2 {
      font-size: 1.2rem;
    }
  }

  /* Make the whole page wrap content nicely */
  html,
  body {
    width: 100%;
    margin: 0;
    padding: 0;
  }

  /* Image and Figure Styling */
  figure {
    margin: 2rem 0;
    text-align: center;
  }

  img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    display: block;
    margin: 1em auto;
  }

  figcaption {
    color: var(--muted);
    font-size: 0.9rem;
    font-style: italic;
    margin-top: 0.8rem;
  }

  /* Horizontal Rule Styling */
  hr {
    border: 0;
    border-top: 1px solid #333;
    margin: 2rem 0;
  }


  .recipe-card {
    background: #2a2a2a;
    border-radius: 8px;
    text-decoration: none;
    transition: transform 0.2s, border-color 0.2s;
    border: 1px solid transparent;
    display: flex;
    flex-direction: column;
  }

  .recipe-card:hover {
    transform: translateY(-5px);
    border-color: var(--accent);
  }

  .card-content {
    padding: 1.5rem;
  }

  .card-content h3 {
    color: var(--text);
    font-size: 1.1rem;
    margin-bottom: 0.5rem;
    text-transform: capitalize;
  }

  .view-link {
    color: var(--accent);
    font-size: 0.85rem;
    font-weight: bold;
  }


  .carousel-container {
    margin-bottom: 2rem;
  }

  .carousel-track {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    gap: 10px;
    border-radius: 12px;
    -webkit-overflow-scrolling: touch;
  }

  /* Hide scrollbars */
  .carousel-track::-webkit-scrollbar {
    display: none;
  }

  .carousel-img {
    flex: 0 0 100%;
    width: 100%;
    max-height: 450px;
    object-fit: cover;
    scroll-snap-align: start;
    border-radius: 8px;
    background-color: #2a2a2a;
  }

  .carousel-hint {
    text-align: center;
    font-size: 0.8rem;
    color: var(--muted);
    margin-top: 10px;
    font-style: italic;
  }

  /* 1. Expand the container to allow 3 columns */
  .container {
    width: 95%;
    max-width: 1000px;
    /* Increased from 650px */
    margin: 2rem auto;
    padding: 2rem;
    background-color: var(--card-bg);
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
  }

  /* 2. Force the 3-column grid */
  .recipe-grid {
    display: grid;
    /* This creates exactly 3 columns on desktop, scaling down on mobile */
    grid-template-columns: repeat(3, 1fr);
    gap: 1.5rem;
    margin-top: 2rem;
  }

  /* 3. Ensure cards look good in the new layout */
  .card-image {
    width: 100%;
    height: 180px;
    /* Slightly taller for the wider columns */
    background-size: cover;
    background-position: center;
    border-bottom: 1px solid #333;
  }

  /* 4. Responsive adjustment: 2 columns on tablets, 1 on mobile */
  @media (max-width: 900px) {
    .recipe-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }

  @media (max-width: 600px) {
    .recipe-grid {
      grid-template-columns: 1fr;
    }

    .container {
      padding: 1rem;
    }
  }
</style>