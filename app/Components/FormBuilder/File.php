<?php

namespace App\Components\FormBuilder;

use ProtoneMedia\Splade\Components\Form\File as SpladeFile;

class File extends Component
{
    private bool|string $placeholder = true;
    private bool $multiple = false;
    private array|bool $filepond = false;
    private bool|string $server = false;
    private bool $preview = false;
    private array|string $accept = '';
    private bool|int|string $minSize = false;
    private bool|int|string $maxSize = false;
    private bool|int $width = false;
    private bool|int $height = false;
    private bool|int $minWidth = false;
    private bool|int $maxWidth = false;
    private bool|int $minHeight = false;
    private bool|int $maxHeight = false;
    private bool|int $minResolution = false;
    private bool|int $maxResolution = false;

    public function placeholder(string $placeholder = '')
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    public function multiple(bool $multiple = true)
    {
        $this->multiple = $multiple;

        return $this;
    }

    public function filepond(array|bool $filepond = true)
    {
        $this->filepond = $filepond;

        return $this;
    }

    /**
     * Only available together with ->filepond()
     *
     * @param bool|string $server
     * @return $this
     */
    public function server(bool|string $server = true)
    {
        $this->server = $server;

        return $this;
    }

    /**
     * Only available together with ->filepond()
     *
     * @param bool $preview
     * @return $this
     */
    public function preview(bool $preview = true)
    {
        $this->preview = $preview;

        return $this;
    }

    /**
     * Set the accepted mimetype(s), automatically adds validation rules
     *
     * @param array|string $mimetypes
     * @return $this
     */
    public function accept(array|string $mimetypes = '')
    {
        $this->accept = $mimetypes;

        $this->rules[] = 'mimetypes:' . (is_array($mimetypes) ? implode(',', $mimetypes) : $mimetypes);

        return $this;
    }

    /**
     * Only available together with ->filepond()
     *
     * @param bool|int|string $minSize
     * @return $this
     */
    public function minSize(bool|int|string $minSize = '')
    {
        $this->minSize = $minSize;
        $this->attributes['min-size'] = $minSize;

        return $this;
    }

    /**
     * Only available together with ->filepond()
     *
     * @param bool|int|string $maxSize
     * @return $this
     */
    public function maxSize(bool|int|string $maxSize = '')
    {
        $this->maxSize = $maxSize;
        $this->attributes['max-size'] = $maxSize;

        return $this;
    }

    /**
     * Sets ->minWidth() and ->maxWidth() to the same value
     *
     * Only available together with ->filepond()
     *
     * @param int $width
     * @return $this
     */
    public function width(int $width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Sets ->minHeight() and ->maxHeight() to the same value
     *
     * Only available together with ->filepond()
     *
     * @param int $height
     * @return $this
     */
    public function height(int $height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Set the min-width
     *
     * Only available together with ->filepond()
     *
     * @param int $minWidth
     * @return $this
     */
    public function minWidth(int $minWidth)
    {
        $this->minWidth = $minWidth;

        return $this;
    }

    /**
     * Set the max-width
     *
     * Only available together with ->filepond()
     *
     * @param int $maxWidth
     * @return $this
     */
    public function maxWidth(int $maxWidth)
    {
        $this->maxWidth = $maxWidth;

        return $this;
    }

    /**
     * Set the min-height
     *
     * Only available together with ->filepond()
     *
     * @param int $minHeight
     * @return $this
     */
    public function minHeight(int $minHeight)
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    /**
     * Set the max-height
     *
     * Only available together with ->filepond()
     *
     * @param int $maxHeight
     * @return $this
     */
    public function maxHeight(int $maxHeight)
    {
        $this->maxHeight = $maxHeight;

        return $this;
    }

    /**
     * Set the min-resolution
     *
     * Only available together with ->filepond()
     *
     * @param int $minResolution
     * @return $this
     */
    public function minResolution(int $minResolution)
    {
        $this->minResolution = $minResolution;

        return $this;
    }

    /**
     * Set the max-resolution
     *
     * Only available together with ->filepond()
     *
     * @param int $maxResolution
     * @return $this
     */
    public function maxResolution(int $maxResolution)
    {
        $this->maxResolution = $maxResolution;

        return $this;
    }

    public function render()
    {
        $object = new SpladeFile(
            name:  $this->name,
            label: $this->label,
            placeholder: $this->placeholder,
            multiple: $this->multiple,
            help: $this->help,
            filepond: $this->filepond,
            server: $this->server,
            preview: $this->preview,
            accept: $this->accept,
            minSize: $this->minSize,
            maxSize: $this->maxSize,
            width: $this->width,
            height: $this->height,
            minWidth: $this->minWidth,
            maxWidth: $this->maxWidth,
            minHeight: $this->minHeight,
            maxHeight: $this->maxHeight,
            minResolution: $this->minResolution,
            maxResolution: $this->maxResolution
        );

        $object->withAttributes($this->attributes);

        return $object->render()->with($object->data())->with(['slot' => '']);
    }
}
