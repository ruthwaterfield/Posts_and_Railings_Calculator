<?php

const POST = 1.5;
const RAILING = 0.1;

/**
 * calculateLength takes a number of posts and railings and outputs the length
 *
 * @param $numPosts int The number of posts
 * @param $numRailings int The number of railings
 *
 * @return int The length of the fence
 */
function calculateLength(int $numPosts, int $numRailings) : float {
    return RAILING*$numRailings +
}