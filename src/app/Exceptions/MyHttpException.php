<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use RuntimeException;

/**
 * 独自例外クラス
 */
class MyHttpException extends RuntimeException implements Responsable
{
    /**
     * @var string メッセージ
     */
    protected $message;

    /**
     * @var int レスポンスコード
     */
    protected int $statusCode;

    /**
     * @var string|null エラーコード
     */
    protected ?string $errorCode;

    /**
     * 初期エラーコード一覧
     *
     * @var array<string>
     */
    protected array $defaultErrorCodes = [
        400 => 'bad_request',
        401 => 'unauthorized',
        404 => 'not_found',
        405 => 'method_not_allowed',
        409 => 'conflict',
        410 => 'gone',
        500 => 'internal_server_error',
    ];

    /**
     * constructor.
     *
     * @param string $message 簡易エラーメッセージ
     * @param int $statusCode ステータスコード
     */
    public function __construct(string $message = '', int $statusCode = 500)
    {
        // メッセージ指定なし → デフォルト エラーコードの名前設定
        $this->message = empty($message) ? $this->defaultErrorCodes[$statusCode] : $message;
        $this->statusCode = $statusCode;
    }

    /**
     * @param string $message
     */
    public function setErrorMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode(int $statusCode): void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @param string $errorCode
     */
    public function setErrorCode(string $errorCode): void
    {
        $this->errorCode = $errorCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->message;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string|null
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * 拡張 Httpレスポンスボディへ (JSONでもつ)
     *
     * @param $request
     *
     * @return JsonResponse
     */
    public function toResponse($request): JsonResponse
    {
        return new JsonResponse(
            $this->getBasicResponse(),
            $this->getStatusCode()
        );
    }

    /**
     * @return array<string>
     */
    protected function getBasicResponse(): array
    {
        return [
            'message' => $this->getErrorMessage(),
            'code' => $this->getErrorCode() ?? $this->getDefaultErrorCode(),
        ];
    }

    protected function getDefaultErrorCode(): string
    {
        return $this->defaultErrorCodes[$this->getStatusCode()];
    }
}
