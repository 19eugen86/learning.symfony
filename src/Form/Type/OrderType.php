<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 31.01.2018
 * Time: 20:49
 */

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('shipping_code', ShippingType::class, array(
            'placeholder' => 'Choose a delivery option',
        ));
    }
}