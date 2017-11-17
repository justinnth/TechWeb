<?php
/**
 * Created by PhpStorm.
 * User: justinnorth
 * Date: 18/10/2017
 * Time: 08:50
 */

abstract class Personnage
{
    /**
     * @var
     */
    protected $_vie;
    /**
     * @var
     */
    protected $_typePers;

    /**
     * @return mixed
     */
    public function getVie()
    {
        return $this->_vie;
    }


    /**
     * @return mixed
     */
    public abstract function attaque();

    /**
     * @return mixed
     */
    public abstract function blesse();

    /**
     * @return mixed
     */
    public abstract function toString();

    /**
     * @return mixed
     */
    public abstract function tuEsQui();
}

/**
 * Class Magicien
 */
abstract class Magicien extends Personnage{
    /**
     * @var
     */
    protected $_magie;

    /**
     * @param $n
     */
    public function addMagie($n){
        $this->_magie += $n;
    }

    /**
     * @param $n
     */
    public function removeMagie($n){
        $this->_magie -= $n;
    }
}

/**
 * Class Guerrier
 */
abstract class Guerrier extends Personnage{
    /**
     * @var
     */
    protected $_force;

    /**
     * @param $n
     */
    public function addForce($n){
        $this->_force += $n;
    }

    /**
     * @param $n
     */
    public function removeForce($n){
        $this->_force -= $n;
    }
}

/**
 * Class Enchanteur
 */
class Enchanteur extends Magicien{
    /**
     * @var
     */
    private $_aura;


    /**
     * Enchanteur constructor.
     * @param $_vie
     * @param $_magie
     * @param $_aura
     */
    public function __construct($_vie, $_magie, $_aura)
    {
        $this->_vie = $_vie;
        $this->_magie = $_magie;
        $this->_aura = $_aura;
        $this->_typePers = "Enchanteur";
    }

    /**
     * @param $n
     */
    public function addAura($n){
        $this->_aura += $n;
    }

    /**
     * @param $n
     */
    public function removeAura($n){
        $this->_aura -= $n;
    }

    /**
     * @return int
     */
    public function attaque()
    {
        // TODO: Implement attaque() method.
        return rand(0,$this->_aura)+rand(0,$this->_magie)+rand(0,$this->_vie);
    }

    /**
     *
     */
    public function blesse()
    {
        // TODO: Implement blesse() method.
        $this->_aura -= rand(10,20);
        $this->_magie -= rand(10,20);
        $this->_vie -= rand(20,30);
    }

    /**
     * @return string
     */
    public function toString()
    {
        // TODO: Implement toString() method.
        return "Enchanteur : vie =$this->_vie magie = $this->_magie aura = $this->_aura";
    }

    /**
     * @return string
     */
    public function tuEsQui()
    {
        // TODO: Implement tuEsQui() method.
        return $this->_typePers;
    }

}

/**
 * Class Truqueur
 */
class Truqueur extends Magicien{
    /**
     * @var
     */
    private $_malice;


    /**
     * Truqueur constructor.
     * @param $_vie
     * @param $_magie
     * @param $_malice
     */
    public function __construct($_vie, $_magie, $_malice)
    {
        $this->_vie = $_vie;
        $this->_magie = $_magie;
        $this->_malice = $_malice;
        $this->_typePers = "Truqueur";
    }

    /**
     * @param $n
     */
    public function addMalice($n){
        $this->_malice += $n;
    }

    /**
     * @param $n
     */
    public function removeMalice($n){
        $this->_malice -= $n;
    }

    /**
     * @return int
     */
    public function attaque()
    {
        // TODO: Implement attaque() method.
        return rand(0,$this->_malice)+rand(0,$this->_magie)+rand(0,$this->_vie);
    }

    /**
     *
     */
    public function blesse()
    {
        // TODO: Implement blesse() method.
        $this->_malice -= rand(10,20);
        $this->_magie -= rand(10,20);
        $this->_vie -= rand(20,30);
    }

    /**
     * @return string
     */
    public function toString()
    {
        // TODO: Implement toString() method.
        return "Truqueur : vie =$this->_vie magie = $this->_magie malice = $this->_malice";
    }

    /**
     * @return string
     */
    public function tuEsQui()
    {
        // TODO: Implement tuEsQui() method.
        return $this->_typePers;
    }
}

/**
 * Class Chevalier
 */
class Chevalier extends Guerrier{
    /**
     * @var
     */
    private $_courage;


    /**
     * Chevalier constructor.
     * @param $_vie
     * @param $_force
     * @param $_courage
     */
    public function __construct($_vie, $_force, $_courage)
    {
        $this->_vie = $_vie;
        $this->_force = $_force;
        $this->_courage = $_courage;
        $this->_typePers = "Chevalier";
    }

    /**
     * @param $n
     */
    public function addCourage($n){
        $this->_courage += $n;
    }

    /**
     * @param $n
     */
    public function removeCourage($n){
        $this->_courage -= $n;
    }

    /**
     * @return int
     */
    public function attaque()
    {
        // TODO: Implement attaque() method.
        return rand(0,$this->_courage)+rand(0,$this->_force)+rand(0,$this->_vie);
    }

    /**
     *
     */
    public function blesse()
    {
        // TODO: Implement blesse() method.
        $this->_courage -= rand(10,20);
        $this->_force -= rand(10,20);
        $this->_vie -= rand(20,30);
    }

    /**
     * @return string
     */
    public function toString()
    {
        // TODO: Implement toString() method.
        return "Chevalier : vie =$this->_vie force = $this->_force courage = $this->_courage";
    }

    /**
     * @return string
     */
    public function tuEsQui()
    {
        // TODO: Implement tuEsQui() method.
        return $this->_typePers;
    }
}

/**
 * Class Excalibur
 */
class Excalibur extends Guerrier{
    /**
     * @var
     */
    private $_agressivite;


    /**
     * Excalibur constructor.
     * @param $_vie
     * @param $_force
     * @param $_agressivite
     */
    public function __construct($_vie, $_force, $_agressivite)
    {
        $this->_vie = $_vie;
        $this->_force = $_force;
        $this->_agressivite = $_agressivite;
        $this->_typePers = "Excalibur";
    }

    /**
     * @param $n
     */
    public function addAgressivite($n){
        $this->_agressivite += $n;
    }

    /**
     * @param $n
     */
    public function removeAgressivite($n){
        $this->_agressivite -= $n;
    }

    /**
     * @return int
     */
    public function attaque()
    {
        // TODO: Implement attaque() method.
        return rand(0,$this->_agressivite)+rand(0,$this->_force)+rand(0,$this->_vie);
    }

    /**
     *
     */
    public function blesse()
    {
        // TODO: Implement blesse() method.
        $this->_agressivite -= rand(10,20);
        $this->_force -= rand(10,20);
        $this->_vie -= rand(20,30);
    }

    /**
     * @return string
     */
    public function toString()
    {
        // TODO: Implement toString() method.
        return "Excalibur : vie =$this->_vie force = $this->_force agressivite = $this->_agressivite";
    }

    /**
     * @return string
     */
    public function tuEsQui()
    {
        // TODO: Implement tuEsQui() method.
        return $this->_typePers;
    }
}
