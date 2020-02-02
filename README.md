How to use it:
---

1. Create a file `public/transmitter.yaml` file based on `public/transmitter.dist.yaml`
2. Run `php public/index.php` in your console.

You should have an output:

```shell script
/var/www/html/greencalculator# php public/index.php
5.96t Greenhouse gas emitted in total for 2019

-- DETAILS --
204258.60g emitted using a Long Haul Plane on 523.74km distance.
319152.60g emitted using a Long Haul Plane on 818.34km distance.
3552116.10g emitted using a Long Haul Plane on 9107.99km distance.
190212.75g emitted using a Long Haul Plane on 975.45km distance.
257400.00g emitted using a Long Haul Plane on 1320.00km distance.
1435200.00g emitted using a Long Haul Plane on 3680.00km distance.

5.19t Greenhouse gas emitted by using alternative transportation

-- DETAILS ALTERNATIVE TRANSPORT --
42946.68g emitted using a Domestic rail on 523.74km distance.
67103.88g emitted using a Domestic rail on 818.34km distance.
3552116.10g emitted using a Long Haul Plane on 9107.99km distance.
39993.45g emitted using a Domestic rail on 975.45km distance.
54120.00g emitted using a Domestic rail on 1320.00km distance.
1435200.00g emitted using a Long Haul Plane on 3680.00km distance.
```