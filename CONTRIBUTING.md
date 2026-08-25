
Name images however you like and send them to me — just list their
full URLs in the recipe's frontmatter (see below) so the site knows
where to fetch them from.

Use task lists [ ] for ingredients.

## Frontmatter

Every markdown file can optionally start with a frontmatter block
listing its images as full URLs (including protocol):

```
---
images:
  - https://img.vjbe.net/snijbonen1.webp
  - https://img.vjbe.net/snijbonen2.webp
thumbnail: https://img.vjbe.net/snijbonen1.webp
---
```

- `images` is the ordered list of full image URLs for the carousel.
  They don't have to live on img.vjbe.net — any reachable URL works.
- `thumbnail` is optional — it defaults to the first image in `images`
  if omitted. (Not used yet, but reserved for a future recipe-card
  thumbnail on the index page.)
- Recipes with no images can skip the frontmatter block entirely.
