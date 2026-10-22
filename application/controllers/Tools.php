<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools extends MY_Controller {

	public function fence()    { $this->show('fence-cost-calculator'); }
	public function deck()     { $this->show('deck-board-calculator'); }
	public function asphalt()  { $this->show('asphalt-calculator'); }
	public function roofing()  { $this->show('roofing-shingle-calculator'); }
	public function concrete() { $this->show('concrete-calculator'); }
	public function stairs()   { $this->show('stair-stringer-calculator'); }
	public function drywall()  { $this->show('drywall-calculator'); }
	public function tile()     { $this->show('tile-calculator'); }
	public function gravel()     { $this->show('gravel-calculator'); }
	public function paver()      { $this->show('paver-calculator'); }
	public function pitch()      { $this->show('roof-pitch-calculator'); }
	public function paint()      { $this->show('paint-calculator'); }
	public function retaining()  { $this->show('retaining-wall-calculator'); }
	public function block()      { $this->show('concrete-block-calculator'); }
	public function flooring()   { $this->show('flooring-calculator'); }
	public function mulch()      { $this->show('mulch-calculator'); }
	public function insulation() { $this->show('insulation-calculator'); }
	public function boardfoot()  { $this->show('board-foot-calculator'); }
	public function markup()     { $this->show('contractor-markup-calculator'); }
	public function bathroom()   { $this->show('bathroom-remodel-cost-calculator'); }
	public function woodfence()   { $this->show('wood-fence-calculator'); }
	public function postconcrete() { $this->show('fence-post-concrete-calculator'); }
	public function vinylfence()  { $this->show('vinyl-fence-calculator'); }
	public function chainlink()   { $this->show('chain-link-fence-calculator'); }
	public function deckcost()    { $this->show('deck-cost-calculator'); }
	public function roofcost()    { $this->show('roof-cost-calculator'); }
	public function siding()      { $this->show('siding-cost-calculator'); }
	public function stain()       { $this->show('stain-calculator'); }
	public function dumpstercost()   { $this->show('dumpster-rental-cost-calculator'); }
	public function dumpstersize()   { $this->show('dumpster-size-calculator'); }
	public function dumpsterweight() { $this->show('dumpster-weight-calculator'); }
	public function junk()           { $this->show('junk-removal-cost-calculator'); }

	private function show($slug)
	{
		$tool = Tool_registry::get($slug);
		if ($tool === NULL || ! Tool_registry::is_live($tool))
		{
			return $this->render_404();
		}

		$data = Tool_registry::data($slug);
		$home = base_url();

		$schema = array(
			array(
				'@context'      => 'https://schema.org',
				'@type'         => 'WebPage',
				'@id'           => $tool['url'] . '#webpage',
				'name'          => $tool['title'],
				'url'           => $tool['url'],
				'description'   => $tool['desc'],
				'datePublished' => $tool['published'],
				'dateModified'  => $tool['updated'],
				'inLanguage'    => 'en-US',
				'isPartOf'      => array('@id' => $home . '#website'),
				'author'        => array('@id' => $home . '#org'),
				'publisher'     => array('@id' => $home . '#org'),
			),
			array(
				'@context'            => 'https://schema.org',
				'@type'               => 'WebApplication',
				'name'                => $tool['name'],
				'url'                 => $tool['url'],
				'applicationCategory' => 'UtilitiesApplication',
				'operatingSystem'     => 'Any (web browser)',
				'browserRequirements' => 'Requires JavaScript',
				'isAccessibleForFree' => TRUE,
				'offers'              => array('@type' => 'Offer', 'price' => '0', 'priceCurrency' => 'USD'),
				'publisher'           => array('@id' => $home . '#org'),
			),
		);

		if ( ! empty($data['faqs']))
		{
			$q = array();
			foreach ($data['faqs'] as $f)
			{
				$q[] = array('@type' => 'Question', 'name' => $f[0], 'acceptedAnswer' => array('@type' => 'Answer', 'text' => strip_tags($f[1])));
			}
			$schema[] = array('@context' => 'https://schema.org', '@type' => 'FAQPage', 'mainEntity' => $q);
		}

		if ( ! empty($data['howto']))
		{
			$steps = array();
			foreach ($data['howto']['steps'] as $i => $s)
			{
				$steps[] = array('@type' => 'HowToStep', 'position' => $i + 1, 'name' => $s[0], 'text' => $s[1], 'url' => $tool['url'] . '#how-to');
			}
			$schema[] = array(
				'@context'  => 'https://schema.org',
				'@type'     => 'HowTo',
				'name'      => $data['howto']['name'],
				'totalTime' => isset($data['howto']['time']) ? $data['howto']['time'] : 'PT2M',
				'tool'      => array(array('@type' => 'HowToTool', 'name' => $tool['name'])),
				'step'      => $steps,
			);
		}

		$this->render('tools/show', array(
			'tool'    => $tool,
			'data'    => $data,
			'related' => Tool_registry::related($slug),
		), array(
			'title'     => $tool['title'],
			'desc'      => $tool['desc'],
			'canonical' => $tool['url'],
			'type'      => 'article',
			'published' => $tool['published'],
			'updated'   => $tool['updated'],
			'schema'    => $schema,
			'crumbs'    => array(
				array('Home', $home),
				array(Tool_registry::$categories[$tool['category']]['label'], site_url(Tool_registry::$categories[$tool['category']]['slug'])),
				array($tool['name'], $tool['url']),
			),
			'js'        => 'tools/' . $slug . '.js',
			'og_image'  => is_file(FCPATH . 'assets/img/og/' . $slug . '.png') ? 'assets/img/og/' . $slug . '.png' : NULL,
		));
	}
}
