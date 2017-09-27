<?php

define('POST', 0.1); //the length of a post (in metres)
define('RAILING', 1.5); //the length of a railing (in metres)
define('MINPOSTS', 2); //the minimum number of posts in a fence
define('MINRAILINGS', 1); // the minimum number of railings in a fence

/**
 * getMinimumLength calculates the minimum allowed length of a fence
 *
 * @return float The minimum fence length in metres.
 */
function getMinimumLength() : float {
    return MINPOSTS*POST + MINRAILINGS*RAILING;
}

/**
 * calculateLength gives the length of a fence with give numbers of posts and railings
 *
 * @param $numPosts int The number of posts
 * @param $numRailings int The number of railings
 *
 * @return float The length of the fence
 */
function calculateLength(int $numPosts, int $numRailings) : float {
    return $numPosts*POST + $numRailings*RAILING;
}

/**
 * isValidFence checks if a combination of posts and railings is a valid fence
 *
 * @param $numPosts int The number of posts
 * @param $numRailings int The number of railings
 *
 * @return bool Is the fence valid?
 */
function isValidFence(int $numPosts, int $numRailings) : bool {
    if ($numPosts < 2 || $numRailings < 1 || $numPosts-1 !== $numRailings) {
        //A fence must have at least 2 posts and a railing.
        //There must be a post for each railing apart from 1 extra at the end.
        return false;
    }
    else {
        return true;
    }
}

/**
 * determinePostsAndRailings works out how many posts and railings you need to make a fence at least as long as a required length
 *
 * @param float $requiredLength The minimum required length
 *
 * @return array The details of the fence (number of posts, railings and length)
 */
function determinePostsAndRailings(float $requiredLength) : array {
    if ($requiredLength <= getMinimumLength()) {
        return [MINPOSTS, MINRAILINGS, getMinimumLength()];
    }
    else {
        $numPosts = MINPOSTS;
        $numRailings = MINRAILINGS;
        $fenceLength = getMinimumLength();
        while ($fenceLength < $requiredLength) {
            $numPosts++;
            $numRailings++;
            $fenceLength = calculateLength($numPosts, $numRailings);
        }
        if(isValidFence($numPosts, $numRailings)) {
            return [$numPosts, $numRailings, $fenceLength];
        }
        else {
            return ['', '', ''];
        }
    }
}

/**
 * producePRString puts together a string to output, given a minimum length of fence.
 *
 * @param float $requiredLength The minimum length of fence requested.
 *
 * @return string The string giving details of the fence.
 */
function producePRString(float $requiredLength) : string {
    $result = '';

    $postsAndRailings = determinePostsAndRailings($requiredLength);
    $posts = $postsAndRailings[0];
    $railings = $postsAndRailings[1];

    $result .= 'You would need ' . $posts . ' posts and ' . $railings . ' railing(s).<br>';

    $fenceLength = $postsAndRailings[2];
    $surplus = $fenceLength - $requiredLength;

    $result .= 'This would create a ' . $fenceLength . 'm long fence. ';
    $result .= 'This would be ' . $surplus . 'm longer than the minimum you specified (' . $requiredLength . 'm).';

    return $result;
}

/**
 * produceLengthString puts together a string to output, given numbers of posts and railings.
 *
 * @param int $numPosts The number of posts.
 * @param int $numRailings The number of railings.
 *
 * @return string The string giving details of the fence.
 */
function produceLengthString(int $numPosts, int $numRailings) {
    $result = '';

    if(isValidFence($numPosts, $numRailings)) {
        $result .= 'By using ' . $numPosts . ' posts and ' . $numRailings . ' railing(s), ';
        $fenceLength = calculateLength($numPosts, $numRailings);
        $result .= 'you would create a fence that is ' . $fenceLength . 'm long.';
    } else {
        $result = 'Sorry, this is not a valid combination of posts and railings.';
    }

    return $result;
}


