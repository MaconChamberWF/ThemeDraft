<a :href="post.link" class="c-media-card">
  <div class="c-media-card__image">
    <div class="o-ratio o-ratio--mediaCard" v-html="post.featured_image"></div>
    <div class="c-media-card__category" v-if="post.category" v-html="post.category"></div>
  </div>
  <div class="c-media-card__content">
    <time class="c-media-card__date">{{ post.date }}</time>
    <h3 class="c-media-card__headline" v-html="post.title"></h3>
  </div>
</a>