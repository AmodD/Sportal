
<div class="tile is-ancestor">
  <div class="tile is-vertical is-8">
    <div class="tile">
      <div class="tile is-parent is-vertical">
        <article class="tile is-child notification is-primary">
          <p class="title">Next Actions</p>
          <p class="subtitle"></p>
        </article>
        <article class="tile is-child notification is-warning">
          <p class="title">Statistics</p>
          <p class="subtitle"></p>
        </article>
      </div>
      <div class="tile is-parent">
        <article class="tile is-child notification is-info">
          <p class="title">{{ Auth::user()->name }}</p>
          <p class="subtitle">Inspiration of the day</p>
          <figure class="image is-4by3">
            <img src="motivation3.jpg">
          </figure>
        </article>
      </div>
    </div>
    <div class="tile is-parent">
      <article class="tile is-child notification is-danger">
        <p class="title">Brainstorming Ideas , Discussions and Comments</p>
        <p class="subtitle">Aligned with the right tile</p>
        <div class="content">
          <!-- Content -->
        </div>
      </article>
    </div>
  </div>
  <div class="tile is-parent">
    <article class="tile is-child notification is-success">
      <div class="content">
        <p class="title">Updates</p>
        <p class="subtitle">10 Jun 2017</p>
        <div class="content">
          <!-- Content -->
<p> <strong class="is-large">{{ Auth::user()->name }}</strong> , currently only the Knowledge Center pages have been created. I will be adding up data in them in the next few days. Will build other menu pages along.  </p>

<p>... till then enjoy surfing the beta version of Sportal and keep your inputs coming </p>
        </div>
      </div>
    </article>
  </div>
</div>
