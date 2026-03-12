const activeFilter = document
  .querySelector(".filters")
  .getAttribute("data-filter");

new Vue({
  el: "#questionApp",
  data() {
    return {
      items: null,
      itemFilterNames: null,
      itemFilters: [],
      filteredItems: this.items,
      searchTerm: null,
      selected: activeFilter ? activeFilter : "all",
      selectedCat: "all",
      currentPage: 1,
      lastPage: false,
      totalPages: 1,
      loading: true,
      loadResults: false,
      showFilters: false,
      perPage: 32,
      totalItems: null,
      orderBy: "date",
      order: "asc",
    };
  },
  mounted() {
    const url =
      "/wp-json/wp/v2/question?acf_format=standard&orderby=" +
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

      this.selectedCat = "all";
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
      let question_category =
        this.selectedCat !== "all"
          ? "&question-category=" + Number(this.selectedCat)
          : "";

      let filters = question_category;
      this.selected = filters !== "" ? filters : "all";
      this.getFilteredProjects(filters);
    },
    getFilteredProjects(filters) {
      const url =
        "/wp-json/wp/v2/question?_embed&orderby=" +
        this.orderBy +
        "&order=" +
        this.order +
        "&per_page=" +
        this.perPage +
        "&acf_format=standard" +
        filters;
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

      let question_category =
        this.selectedCat !== "all"
          ? "&question-category=" + Number(this.selectedCat)
          : "";

      let filters = question_category;
      this.selected = filters !== "" ? filters : "all";

      const url =
        "/wp-json/wp/v2/question?_embed&acf_format=standard" +
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
          this.refreshTotalPages();
        })
        .catch((error) => {
          console.log(error);
          this.errored = true;
        })
        .finally(() => ((this.loading = false), (this.loadResults = true)));
    },
    loadMore() {
      if (this.loading === false) {
        this.loading = true;
        this.currentPage = this.currentPage + 1;
        const currentPage = this.currentPage;
        const url =
          this.selected !== "all"
            ? "/wp-json/wp/v2/question?_embed&orderby=" +
              this.orderBy +
              "&order=" +
              this.order +
              "&per_page=" +
              this.perPage +
              "&acf_format=standard" +
              this.selected +
              "&page=" +
              currentPage
            : "/wp-json/wp/v2/question?_embed&orderby=" +
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
