<?php
/**
 * @param int|string $count длинна списка уникальных значений
 * @param int|string $length колличество знаков в каждом числе
 * @return array
 */
    function uniqueNumberGeneration(int $count, int $length) :array
    {
        $arrayAssoc = [];

        /**
         * Вычисление диапазона возможных чисел.
         */
        $minNumber = pow(10, $length - 1);
        $maxNumber = pow(10, $length) - 1;

        /**
         * проверка, может ли быть создан массив уникальных значений.
         * если максимальноеколличество символов в числе = 1, а колличество требуемых значений 20,
         * то такой массив нельзя создать.
         */
        if ($maxNumber - $minNumber < $count) {
            throw new \Exception(sprintf('Всего %s возможных вариантов чисел. 
            Список длинной %s не может быть заполнен.', $maxNumber - $minNumber, $count));
        }

        while (count($arrayAssoc) < $count) {

            /**
             * используем mt_rand так как он "быстрее" rand.
             */
            $rand = mt_rand($minNumber, $maxNumber);
            if (!isset($arrayAssoc[$rand])) {
                /**
                 * используем ассациативный массив для быстрого поиска по массиву.
                 * это создаст сложности для создания списка, но это невелирует поиск по ключу.
                 */
                $arrayAssoc[$rand] = $rand;
            }
        }

        /**
         * так как требуют получить !список! то нужно создать новый массив на основе уже усществующего
         * array_value работает чуть быстрее чем array_keys
         */
        return array_values($arrayAssoc);
    }

    uniqueNumberGeneration(500000, 10);
