<?php

/**
 * # -----------------------------------------------------------------------------
 * # Create and Process Tree structure in PHP with TreeNode class.               |
 * # -----------------------------------------------------------------------------
 * # Tutorial & Usage: http://asimishaq.com/resources/tree-data-structure-in-php |								|
 * # -----------------------------------------------------------------------------
 * 
 * 
 * @author Asim Ishaq
 * @email asim709@gmail.com
 * @copyright GPL v2 or later
 * 
 */
class TreeNode {
	
	private $_parent = NULL;
	
	private $_level = 1;
	
	/**
	 * This array will contain the child items of a specifc Node in tree and
	 * each node in tree must be of type TreeNode
	 *
	 * @var Array of TreeNode
	 */
	private $_children = array ();
	
	/**
	 * Value of Node, it can be of any type.
	 *
	 * @var Varient
	 */
	private $_value;
	
	public function __construct($value = "") {
		$this->setValue ( $value );
	}
	
	public function setValue($value) {
		$this->_value = $value;
	}
	
	/**
	 *
	 * @param $parentNode TreeNode       	
	 */
	public function setParentNode(TreeNode $parentNode) {
		$this->_parent = $parentNode;
	}
	
	/**
	 * Add a child node to current tree node
	 *
	 * @param $childNode TreeNode       	
	 */
	public function addChildNode(TreeNode $childNode) {
		$childNode->setParentNode ( $this );
		$childNode->_level = $this->_level + 1;
		array_push ( $this->_children, $childNode );
	}
	
	/**
	 * Count the number of immediate child nodes
	 */
	public function countChildren() {
		return sizeof ( $this->_children );
	}
	
	/**
	 * Counts all children and sub-children of this node recursively
	 * Note: Do not provide any argument
	 */
	public function countAllChildren(&$count = 0) {
		
		foreach ( $this->_children as $child ) {
			$count ++;
			$child->countAllChildren ( $count );
		}
		
		return $count;
	}
	
	/**
	 * Get value of Current node
	 */
	public function getValue() {
		return $this->_value;
	}
	
	/**
	 * Get level of current node.
	 * The level starts from 1 to onwards. Forexample if this Node has no parent
	 * node then it will be on level one. The level is Set for a node when
	 * Children is added to a node
	 */
	public function getLevel() {
		return $this->_level;
	}
	
	public function getParentNode() {
		return $this->_parent;
	}
	
	/**
	 * Return immediate child nodes of current tree node
	 */
	public function getChildren() {
		return $this->_children;
	}
	
	/**
	 * The index starts from 0 to onwards
	 *
	 * @param $index Integer       	
	 */
	public function getChildNodeByIndex($index) {
		if ($index >= 0 && $index < sizeof ( $this->_children ))
			return $this->_children [$index];
		
		return false;
	}
	
	/**
	 * Recursively iterate into all child nodes of current tree node and return
	 * an array of all children (each node in array will be an instance of
	 * TreeNode class)
	 *
	 * @return Array of all child nodes
	 */
	public function getAllChildren(&$children = array()) {
		
		array_push ( $children, $this );
		
		foreach ( $this->_children as $child ) {
			$child->getAllChildren ( $children );
		}
		
		return $children;
	}
	
	/**
	 * Similar to getAllChildren function but it return an array of values of
	 * all child nodes.
	 *
	 * @return Array of Values of all Child nodes
	 */
	public function getAllChildrenValues() {
		$values = array ();
		$nodes = $this->getAllChildren ();
		
		foreach ( $nodes as $node )
			array_push ( $values, $node->getValue () );
		
		return $values;
	}
	
	public function getAllChildrenByLevel($level, &$children = array()) {
		
		if ($level == $this->_level) {
			array_push ( $children, $this );
		}
		
		foreach ( $this->_children as $child ) {
			$child->getAllChildrenByLevel ( $level, $children );
		}
		
		return $children;
	}
	
	/**
	 * Count total number of Levels in this tree.
	 * Start count from current node and count current node as level 1
	 *
	 * Note: Do not provide any argument
	 */
	public function countLevels(&$level = 0) {
		
		if ($this->countChildren () > 0) {
			$level ++;
			foreach ( $this->_children as $child )
				$child->countLevels ( $level );
		}
		
		return $level == 0 ? 1 : $level;
	}
	
	/**
	 * Print All items in tree structure.
	 * Can be used for debugging.
	 */
	public function dump($indent = 0) {
		
		for($i = 0; $i < $indent * 5; $i ++)
			echo '&nbsp;';
		echo "L" . ($this->_level) . ")&nbsp;" . $this . "<br>";
		
		if ($this->countChildren () > 0) {
			$indent ++;
			foreach ( $this->_children as $child )
				$child->dump ( $indent );
		}
	}
	
	/**
	 * Example:
	 * $n = new TreeNode(24);
	 * echo $n;
	 * ---
	 * output: 24
	 */
	public function __toString() {
		return $this->_value;
	}

}
