<?php

define('POST', 1.5);
define('RAILING', 0.1);
define('MINPOSTS', 2);
define('MINRAILINGS', 1);
/**
 * getMinimumLength calculates the minimum allowed length (with 2 posts and 1 railing)
 * @return float The minimum fence length
 */
function getMinimumLength() : float {
    return MINPOSTS*POST + MINRAILINGS*RAIlING;
}


/**
 * calculateLength takes a number of posts and railings and outputs the length
 *
 * @param $numPosts int The number of posts
 * @param $numRailings int The number of railings
 *
 * @return int The length of the fence
 */
function calculateLength(int $numPosts, int $numRailings) : float {
    return RAILING*$numRailings + POST*$numPosts;
}

/**
 * isValidFence checks if a number of posts and railings is a valid fence
 *
 * @param $numPosts int The number of posts
 * @param $numRailings int The number of railings
 *
 * @return bool Is the fence valid?
 */
function isValidFence(int $numPosts, int $numRailings) : bool {
    if ($numPosts < 2)
    {
        return false;
    }
    else if ($numRailings < 1)
    {
        return false;
    }
    else if ($numPosts-1 !== $numRailings)
    {
        //There must be a post for each railing apart from 1 extra at the end.
        return false;
    }
    else
    {
        return true;
    }
}

/**
 * determinePostsAndRailings works out how many posts and railings you need to make a fence over a required length
 *
 * @param float $requiredLength The mimimum required length
 * @return array
 */
function determinePostsAndRailings(float $requiredLength) : array {
    if ($requiredLength <= getMinimumLength()) {
        return [MINPOSTS, MINRAILINGS];
    }
    else {
        $numPosts = MINPOSTS;
        $numRailings = MINRAILINGS;
        $fenceLength = getMinimumLength();
        while ($fenceLength <= $requiredLength) {
            $numPosts++;
            $numRailings++;
            $fenceLength = calculateLength($numPosts, $numRailings);
        }
        if(isValidFence($numPosts, $numRailings)) {
            return [$numPosts, $numRailings];
        }
        else {
            return [];
        }
    }
}

/**
 * calculateSurplus gives the length of fence surplus to the requirement
 *
 * @param int $numPosts The number of posts
 * @param int $numRailings The number of railings
 * @param float $requiredLength The required Length
 *
 * @return float The surplus length that will be created
 */
function calculateSurplus(int $numPosts, int $numRailings, float $requiredLength) : float {
    return calculateLength($numPosts, $numRailings) - $requiredLength;
}



