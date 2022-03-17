<template>
  <div class="container py-4">
    <!-- TECHONOLOGIES CHECKBOXES -->
    <form action="/api/projects/technologies" class="text-center" method="post">
      <!-- TO-DO -->
      <div class="form-check form-check-inline" v-for="(tech,index) in technologies" :key="`tech-${index}`">
        <input class="form-check-input" type="checkbox" :value="tech" :id="tech" name="tech[]">
        <!-- <input class="form-check-input" type="checkbox" value="" id="flexCheckDisabled" disabled> -->
        <label class="form-check-label" :for="tech">
          {{tech}}
        </label>
      </div>
      <div class="col mb-3">
        <button class="btn btn-light" type="submit">Ricerca</button>
      </div>
    </form>


    <!-- PRINT ALL PROJECTS -->
    <div class="card" v-for="(prj,index) in projects" :key="`prj-${index}`">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <!--  PROJECT NAME -->
          <h4 class="card-text text-uppercase">{{prj.name}}</h4>
          <div v-if="prj.technologies" class="technologies">
            <ul class="list-group list-group-horizontal">
              <li v-for="(tech,index) in prj.technologies" :key="`tech-${index}`" class="list-group-item border-0">
                <span class="badge rounded-pill" :class="tech.name === 'HTML' ? 'bg-success' : (tech.name === 'PHP' ? 'bg-info' : (tech.name === 'JS' ? 'bg-warning text-dark' : 'bg-secondary'))">{{tech.name}}</span>
                </li>
            </ul>
          </div>
        </div>
        <!--  PROJECT SCREEN -->
        <img v-if="prj.screen" class="card-img-bottom" src="">
         <!-- PROJECT URL -->
        <a class="card-link" :href="prj.url">{{prj.url}}</a>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Projects',
  data() {
    return {
      projects: [],
      technologies: [],
    }
  },
  methods: {
    getProjects(url) {
      axios.get(url)
      .then(res => {
        // console.log(res.data.projects);
        this.projects = res.data.projects;
      })
      .catch(err => console.error(err));
    },
    getTechnologies(url) {
      axios.get(url)
      .then(res =>{
        this.technologies = res.data.technologies;
        // console.log(this.technologies);
      })
      .catch(err => console.error(err));
    }
  },
  created() {
    // get technologies for checkboxes
    this.getTechnologies('api/technologies');
    // get all projects
    this.getProjects('api/projects');
  }
}
</script>

<style>

</style>