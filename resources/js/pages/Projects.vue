<template>
  <div class="container py-4">
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
    }
  },
  methods: {
    apiCall() {
      axios.get('api/projects')
      .then(res => {
        // console.log(res.data.projects);
        this.projects = res.data.projects;
      });
    }
  },
  created() {
    this.apiCall();
  }
}
</script>

<style>

</style>