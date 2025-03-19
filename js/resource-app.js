const activeFilter = document
  .querySelector(".filters")
  .getAttribute("data-filter");

new Vue({
  el: "#resourceApp",
  data() {
    return {
      items: null,
      itemFilterNames: null,
      itemFilters: [],
      filteredItems: this.items,
      searchTerm: null,
      selected: activeFilter ? activeFilter : "all",
      selectedRegion: "all",
      selectedGrade: "all",
      selectedLang: "all",
      selectedType: "all",
      currentPage: 1,
      lastPage: false,
      totalPages: 1,
      loading: true,
      loadResults: false,
      showFilters: false,
      perPage: 12,
      totalItems: null,
      orderBy: "title",
      order: "asc",
    };
  },
  mounted() {
    const url =
      "/wp-json/wp/v2/resource?acf_format=standard&orderby=" +
      this.orderBy +
      "&order=" +
      this.order +
      "&per_page=" +
      this.perPage;
    axios
      .get(url)
      .then((response) => {
        this.items = response.data;

        this.filteredItems = this.items;
        this.totalPages = Number(response.headers["x-wp-totalpages"]);
        this.totalItems = Number(response.headers["x-wp-total"]);

        this.refreshTotalPages();
      })
      .catch((error) => {
        console.log(error);
        this.errored = true;
      })
      .finally(() => ((this.loading = false), (this.loadResults = true)));
  },
  methods: {
    clearFilters() {
      this.currentPage = 1;
      this.loading = true;

      this.selectedRegion = "all";
      this.selectedGrade = "all";
      this.selectedLang = "all";
      this.selectedType = "all";
      this.searchTerm = null;
      this.loadResults = false;

      this.getFilters();
    },
    refreshTotalPages() {
      const totalPagesNum = Number(this.totalPages);
      this.lastPage = this.currentPage >= totalPagesNum;
    },
    filterProjects() {
      this.loading = true;
      this.loadResults = false;
      this.currentPage = 1;
      this.getFilters();
    },
    getFilters() {
      console.log(this.searchTerm);
      // console.log('selected: ' + this.selected);
      let program_region =
        this.selectedRegion !== "all"
          ? "&region=" + Number(this.selectedRegion)
          : "";
      let program_grade =
        this.selectedGrade !== "all"
          ? "&grade_level=" + Number(this.selectedGrade)
          : "";
      let program_lang =
        this.selectedLang !== "all"
          ? "&resource_language=" + Number(this.selectedLang)
          : "";
      let program_type =
        this.selectedType !== "all"
          ? "&resource_type=" + Number(this.selectedType)
          : "";
      let search_term =
        this.searchTerm !== null ? "&search=" + this.searchTerm : "";
      // let filters = program_region + program_age + program_season + program_type + program_availability + program_delivery;

      let filters = [
        program_region,
        program_grade,
        program_lang,
        program_type,
        search_term,
      ].join("");

      console.log(filters);

      this.selected = filters !== "" ? filters : "all";
      // console.log(filters);
      this.getFilteredProjects(filters);
    },
    getFilteredProjects(filters) {
      const url =
        "/wp-json/wp/v2/resource?_embed&orderby=" +
        this.orderBy +
        "&order=" +
        this.order +
        "&per_page=" +
        this.perPage +
        "&acf_format=standard" +
        filters;
      // console.log(url);
      axios
        .get(url)
        .then((response) => {
          this.items = response.data;
          this.filteredItems = this.items;
          this.totalPages = Number(response.headers["x-wp-totalpages"]);
          this.totalItems = Number(response.headers["x-wp-total"]);
          this.refreshTotalPages();
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => ((this.loading = false), (this.loadResults = true)));
    },
    searchProjects() {
      this.currentPage = 1;
      this.loading = true;
      this.loadResults = false;

      let program_region =
        this.selectedRegion !== "all"
          ? "&region=" + Number(this.selectedRegion)
          : "";
      let program_grade =
        this.selectedGrade !== "all"
          ? "&grade_level=" + Number(this.selectedGrade)
          : "";
      let program_lang =
        this.selectedLang !== "all"
          ? "&resource_language=" + Number(this.selectedLang)
          : "";
      let program_type =
        this.selectedType !== "all"
          ? "&resource_type=" + Number(this.selectedType)
          : "";

      let search_term =
        this.searchTerm !== null ? "&search=" + this.searchTerm : "";

      // let filters = program_region + program_age + program_season + program_type + program_availability + program_delivery;

      let filters = [
        program_region,
        program_grade,
        program_lang,
        program_type,
        search_term,
      ].join("");

      // console.log(filters);

      this.selected = filters !== "" ? filters : "all";

      const url =
        "/wp-json/wp/v2/resource?_embed&acf_format=standard" +
        filters +
        "&orderby=" +
        this.orderBy +
        "&order=" +
        this.order +
        "&per_page=" +
        this.perPage;
      axios
        .get(url)
        .then((response) => {
          this.items = response.data;
          this.filteredItems = this.items;
          this.totalPages = Number(response.headers["x-wp-totalpages"]);
          this.totalItems = Number(response.headers["x-wp-total"]);
          // console.log(this.totalPages);
          this.refreshTotalPages();
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => ((this.loading = false), (this.loadResults = true)));
    },
    loadMore() {
      console.log(this.selected);
      if (this.loading === false) {
        this.loading = true;
        this.currentPage = this.currentPage + 1;
        const currentPage = this.currentPage;
        const url =
          this.selected !== "all"
            ? "/wp-json/wp/v2/resource?_embed&orderby=" +
              this.orderBy +
              "&order=" +
              this.order +
              "&per_page=" +
              this.perPage +
              "&acf_format=standard" +
              this.selected +
              "&page=" +
              currentPage
            : "/wp-json/wp/v2/resource?_embed&orderby=" +
              this.orderBy +
              "&order=" +
              this.order +
              "&per_page=" +
              this.perPage +
              "&acf_format=standard&page=" +
              currentPage;
        axios
          .get(url)
          .then((response) => {
            const newItems = response.data;
            for (item of newItems) {
              this.items.push(item);
            }
            this.filteredItems = this.items;
          })
          .catch((error) => {
            console.log(error);
            this.errored = true;
          })
          .finally(() => (this.loading = false));

        this.refreshTotalPages();
      }
    },
  },
  filters: {
    capitalize: function (value) {
      if (!value) return "";
      value = value.toString();
      value = value.replaceAll("program_", "");
      return value.charAt(0).toUpperCase() + value.slice(1);
    },
  },
});
