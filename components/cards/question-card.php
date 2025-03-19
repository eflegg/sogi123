<?php
$current_lang = pll_current_language();
$the_question = get_field('questions');
if ($the_question):
    $question = $the_question['question'];
    $answer = $the_question['answer'];
?>

    <li class="card question-card card-color">
        <a href="<?php the_permalink(); ?>">
            <div class="question--text">
                <span class="the-question">
                    "<?php echo $question ?>"
                </span>
                <span class="the-answer">
                    <?php echo $answer; ?>
                </span>
                <span class="continue-reading"><?php echo $current_lang === 'fr' ? 'Lire la suite' : 'Continue reading' ?> &#10142;</span>
            </div>
        </a>
    </li>
<?php endif; ?>