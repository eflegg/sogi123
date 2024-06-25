const activeFilter = document.querySelector('.filters').getAttribute('data-filter');

new Vue({
  el: '#resourceApp',
  data() {
    return {
      items: null,
      itemFilterNames: null,
      itemFilters: [],
      filteredItems: this.items,
      selected: activeFilter ? activeFilter : 'all',
      selectedRegion: 'all',
      selectedGrade: 'all',
      selectedLang: 'all',
      selectedType: 'all',
      currentPage: 1,
      lastPage: false,
      totalPages: 1,
      loading: true,
      showFilters: false,
      perPage: 9, 
      totalItems: null
    }
  },
  mounted () {
    //fetch resource
    // const preFilter = '&program_age=' + this.selected;
    // this.selected = preFilter !== '&program_age=all' ? preFilter : 'all';
    // const url = this.selected !== 'all' ? '/wp-json/wp/v2/resource?_embed&per_page=' + this.perPage + '&acf_format=standard' + preFilter : '/wp-json/wp/v2/resource?_embed&per_page=' + this.perPage + '&acf_format=standard';
    const url = '/wp-json/wp/v2/resource?acf_format=standard&per_page=' + this.perPage;
    // // console.log(url);
    axios
      .get(url)
      .then(response => {
        this.items = response.data

        this.filteredItems = this.items;
        this.totalPages = Number(response.headers['x-wp-totalpages']);
        this.totalItems = Number(response.headers['x-wp-total']);

        this.refreshTotalPages();
      })
      .catch(error => {
        console.log(error)
        this.errored = true
      })
      .finally(() => this.loading = false)
  },
  methods: {
    clearFilters() {
      this.currentPage = 1;

      this.selectedRegion = 'all';
      this.selectedGrade = 'all';
      this.selectedLang = 'all';
      this.selectedType = 'all';

      this.getFilters();
    },
    refreshTotalPages() {
      const totalPagesNum = Number(this.totalPages)
      this.lastPage = this.currentPage >= totalPagesNum;
    },
    filterProjects() {
      this.loading = true;
      this.currentPage = 1;
      this.getFilters();   
    },
    getFilters() {
      // console.log('selected: ' + this.selected);
      let program_region = this.selectedRegion !== 'all' ? '&region=' + Number(this.selectedRegion) : '';
      let program_grade = this.selectedGrade !== 'all' ? '&grade_level=' + Number(this.selectedGrade) : '';
      let program_lang = this.selectedLang !== 'all' ? '&resource_language=' + Number(this.selectedLang) : '';
      let program_type = this.selectedType !== 'all' ? '&resource_type=' + Number(this.selectedType) : '';

      // let filters = program_region + program_age + program_season + program_type + program_availability + program_delivery;
      
      let filters = [
        program_region, 
        program_grade, 
        program_lang, 
        program_type 
      ].join('');

      // console.log(filters);

      this.selected = filters !== '' ? filters : 'all';
      // console.log(filters);
      this.getFilteredProjects(filters);
    },
    getFilteredProjects(filters) {
      const url = '/wp-json/wp/v2/resource?_embed&per_page=' + this.perPage + '&acf_format=standard' + filters;
      // console.log(url);
        axios
        .get(url)
        .then(response => {
          this.items = response.data
          this.filteredItems = this.items
          this.totalPages = Number(response.headers['x-wp-totalpages']);
          this.totalItems = Number(response.headers['x-wp-total']);
          this.refreshTotalPages();
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        })
        .finally(() => this.loading = false)
    },
    loadMore() {
      console.log(this.selected);
      if( this.loading === false ) {
        this.loading = true;
        this.currentPage = this.currentPage + 1;
        const currentPage = this.currentPage;
        const url = this.selected !== 'all' ? '/wp-json/wp/v2/resource?_embed&per_page=' + this.perPage + '&acf_format=standard' + this.selected + '&page=' + currentPage : '/wp-json/wp/v2/resource?_embed&per_page=' + this.perPage + '&acf_format=standard&page=' + currentPage ;
        axios
        .get(url)
        .then(response => {
          const newItems = response.data;
          for(item of newItems){
            this.items.push(item);
          }
          this.filteredItems = this.items
        })
        .catch(error => {
          console.log(error)
          this.errored = true
        })
        .finally(() => this.loading = false)

        this.refreshTotalPages()
      }
    }
  },
  filters: {
    capitalize: function (value) {
      if (!value) return ''
      value = value.toString();
      value = value.replaceAll('program_', '');
      return value.charAt(0).toUpperCase() + value.slice(1);
    }
  }
})

// new Vue({
//   el: '#resourceApp',
//   data() {
//     return {
//       items: null,
//       filteredItems: this.items,
//       featuredItems: null,
//       selected: activeFilter === '' ? 'all' : activeFilter,
//       selectedCat: activeFilter === '' ? 'all' : activeFilter,
//       selectedLocation: 'all',
//       selectedName: 'Filter:',
//       selectedType: 'all',
//       selectedGrade: 'all',
//       selectedRegion: 'all',
//       selectedLang: 'all',
//       currentPage: 1,
//       lastPage: false,
//       totalPages: 1,
//       loading: true,
//       showFilters: false,
//       perPage: 12,
//       totalItems: null,
//       orderBy: 'date',
//       order: 'desc'
//     }
//   },
//   mounted () {
//     const url = this.selected !== 'all' ? '/wp-json/wp/v2/resource?acf_format=standard&per_page=' + this.perPage + '&resource_category=' + this.selected : '/wp-json/wp/v2/resource?acf_format=standard&per_page=' + this.perPage;
//     axios
//       .get(url)
//       .then(response => {
//         this.items = response.data

//         this.filteredItems = this.items;
//         this.totalPages = Number(response.headers['x-wp-totalpages']);
//         this.totalItems = Number(response.headers['x-wp-total']);

//         this.refreshTotalPages();
//       })
//       .catch(error => {
//         console.log(error)
//         this.errored = true
//       })
//       .finally(() => this.loading = false)
//   },
//   methods: {
//     toggleFilters() {
//       this.showFilters === false ? this.showFilters = true : this.showFilters = false;
//     },
//     refreshTotalPages() {
//       const totalPagesNum = Number(this.totalPages)
//       this.lastPage = this.currentPage >= totalPagesNum;
//     },
//     filterProjects() {
//       this.currentPage = 1;
//       // let selected = Number(this.selected);
//       this.orderBy === 'date' ? this.order = 'desc' : this.order = 'asc';
//       this.loading = true;
//       this.getFilters(); 
//     },
//     getFilters() {
//       // let selected_location = this.selectedLocation !== 'all' ? '&resource_location=' + Number(this.selectedLocation) : '';
//       let selected_category = this.selectedCat !== 'all' ? '&resource_category=' + Number(this.selectedCat) : '';

//       // let filters = [
//       //   selected_location, 
//       //   selected_category
//       // ].join('');

//       let filters = selected_category;

//       // console.log(filters);

//       this.selected = filters !== '' ? filters : 'all';
//       // console.log(filters);
//       this.getFilteredProjects(filters);
//     },
//     getFilteredProjects(filters) {
//       const url = this.selected !== 'all' ? '/wp-json/wp/v2/resource?acf_format=standard&per_page=' + this.perPage + filters : '/wp-json/wp/v2/resource?acf_format=standard&per_page=' + this.perPage;
//         axios
//         .get(url)
//         .then(response => {
//           this.items = response.data
//           this.filteredItems = this.items
//           this.totalPages = Number(response.headers['x-wp-totalpages'])
//           this.totalItems = Number(response.headers['x-wp-total'])
//           console.log(this.totalPages);
//           this.refreshTotalPages();
//         })
//         .catch(error => {
//           console.log(error)
//           this.errored = true
//         })
//         .finally(() => this.loading = false)
//     },
//     loadMore() {
//       if( this.loading === false ) {
//         this.loading = true;
//         this.currentPage = this.currentPage + 1;
//         const currentPage = this.currentPage;
//         const url = this.selected !== 'all' ? '/wp-json/wp/v2/resource?acf_format=standard&per_page=' + this.perPage + this.selected + '&page=' + currentPage : '/wp-json/wp/v2/resource?acf_format=standard&per_page=' + this.perPage + '&page=' + currentPage;

//         axios
//         .get(url)
//         .then(response => {
//           const newItems = response.data;
//           for(item of newItems){
//             this.items.push(item);
//           }
//           this.filteredItems = this.items
//         })
//         .catch(error => {
//           console.log(error)
//           this.errored = true
//         })
//         .finally(() => this.loading = false)

//         this.refreshTotalPages()
//       }
//     },
//   },
// })