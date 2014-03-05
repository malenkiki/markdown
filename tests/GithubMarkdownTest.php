<?php
/**
 * @copyright Copyright (c) 2014 Carsten Brandt
 * @license https://github.com/cebe/markdown/blob/master/LICENSE
 * @link https://github.com/cebe/markdown#readme
 */

namespace cebe\markdown\tests;
use cebe\markdown\GithubMarkdown;

/**
 * Test case for the github flavored markdown.
 *
 * @author Carsten Brandt <mail@cebe.cc>
 */
class GithubMarkdownTest extends BaseMarkdownTest
{
	public function createMarkdown()
	{
		return new GithubMarkdown();
	}

	public function getDataPaths()
	{
		return [
			'markdown-data' => __DIR__ . '/markdown-data',
			'github-data' => __DIR__ . '/github-data',
		];
	}

	public function testNewlines()
	{
		$markdown = $this->createMarkdown();
		$this->assertEquals("This is text<br />\nnewline\nnewline.", $markdown->parseParagraph("This is text  \nnewline\nnewline."));
		$markdown->enableNewlines = true;
		$this->assertEquals("This is text<br />\nnewline<br />\nnewline.", $markdown->parseParagraph("This is text  \nnewline\nnewline."));
	}
}
