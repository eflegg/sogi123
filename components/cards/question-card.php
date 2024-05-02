<?php $the_question = get_field('questions');
	if($the_question):?>
<?php $question = $the_question['question'];?>
<?php $answer = $the_question['answer'];?>

<li tabIndex="0" class="card question-card card-color">
    <div  class="question--text">
        <span class="the-question">
            "<?php echo $question ?>"
        </span>
       <span class="the-answer">
       <?php echo $answer;?>
       </span>
        <a tabIndex="0" class="continue-reading" href="<?php the_permalink(); ?>">Continue reading &#10142;</a>
    </div>    
</li>
<?php endif;?>