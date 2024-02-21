<?php $active_filter = get_field('active_filter'); ?>

<div class="filters" <?php if($active_filter): ?>data-filter="<?php echo $active_filter->term_id; ?>"<?php endif; ?>>
  <div class="flex">
  <?php
  	$filters = get_terms( array(
      'taxonomy'   => 'program_region',
      'hide_empty' => false,
  	) );
    $label = 'Program Region';
     ?>
    <div class="custom-select" :class="{ selected: selectedRegion !== 'all' }"> 
      <label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
      <select 
      v-model="selectedRegion"
      v-on:change="filterProjects()">
        <option disabled value="all"><?php echo $label; ?></option>
        <?php foreach ($filters as $filter): ?>
        <option value="<?php echo $filter->term_id; ?>"><?php echo $filter->name; ?></option>
        <?php endforeach; ?>
        <option value="all">All</option>
      </select>
    </div>
    <?php
    $filters = get_terms( array(
      'taxonomy'   => 'program_age',
      'hide_empty' => false,
    ) ); 
    $label = 'Program Age';
    ?>

    <div class="custom-select" :class="{ selected: selectedAge !== 'all' }"> 
      <label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
      <select 
      v-model="selectedAge"
      v-on:change="filterProjects()">
        <option disabled value="all"><?php echo $label; ?></option>
        <?php foreach ($filters as $filter): ?>
        <option value="<?php echo $filter->term_id; ?>"><?php echo $filter->name; ?></option>
        <?php endforeach; ?>
        <option value="all">All</option>
      </select>
    </div>
    <?php
    $filters = get_terms( array(
      'taxonomy'   => 'program_season',
      'hide_empty' => false,
    ) ); 
    $label = 'Program Season';
    ?>

    <div class="custom-select" :class="{ selected: selectedSeason !== 'all' }"> 
      <label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
      <select 
      v-model="selectedSeason"
      v-on:change="filterProjects()">
        <option disabled value="all"><?php echo $label; ?></option>
        <?php foreach ($filters as $filter): ?>
        <option value="<?php echo $filter->term_id; ?>"><?php echo $filter->name; ?></option>
        <?php endforeach; ?>
        <option value="all">All</option>
      </select>
    </div>

     <?php
    $filters = get_terms( array(
      'taxonomy'   => 'program_type',
      'hide_empty' => false,
    ) ); 
    $label = 'Activity Type';
    ?>

    <div class="custom-select" :class="{ selected: selectedType !== 'all' }"> 
      <label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
      <select 
      v-model="selectedType"
      v-on:change="filterProjects()">
        <option disabled value="all"><?php echo $label; ?></option>
        <?php foreach ($filters as $filter): ?>
        <option value="<?php echo $filter->term_id; ?>"><?php echo $filter->name; ?></option>
        <?php endforeach; ?>
        <option value="all">All</option>
      </select>
    </div>

     <?php
    $filters = get_terms( array(
      'taxonomy'   => 'program_availability',
      'hide_empty' => false,
    ) ); 
    $label = 'Availability';
    ?>

    <div class="custom-select" :class="{ selected: selectedAvailability !== 'all' }"> 
      <label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
      <select 
      v-model="selectedAvailability"
      v-on:change="filterProjects()">
        <option disabled value="all"><?php echo $label; ?></option>
        <?php foreach ($filters as $filter): ?>
        <option value="<?php echo $filter->term_id; ?>"><?php echo $filter->name; ?></option>
        <?php endforeach; ?>
        <option value="all">All</option>
      </select>
    </div>

     <?php
    $filters = get_terms( array(
      'taxonomy'   => 'program_delivery',
      'hide_empty' => false,
    ) ); 
    $label = 'Delivery';
    ?>

    <div class="custom-select" :class="{ selected: selectedDelivery !== 'all' }"> 
      <label for="types"><span class="screen-reader-text"><?php echo $label; ?></span></label>
      <select 
      v-model="selectedDelivery"
      v-on:change="filterProjects()">
        <option disabled value="all"><?php echo $label; ?></option>
        <?php foreach ($filters as $filter): ?>
        <option value="<?php echo $filter->term_id; ?>"><?php echo $filter->name; ?></option>
        <?php endforeach; ?>
        <option value="all">All</option>
      </select>
    </div>
  </div>
</div> <!-- end flex filters container -->
  <!-- end filters -->